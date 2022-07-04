<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
// use Request;
use App\Models\ProductReview;
use App\Models\ProductReviewReply;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;

class HomeController extends Controller
{
    protected $view_path ='frontend.';


    public function index(){
        $data = [];
        $data['categories'] = Category::active()->with(['subCategories'=>function($sub_category){
           $sub_category->has('products')
           ->withCount('products')
           ->orderBy('products_count','desc');
        }])
        ->has('subCategories')
        ->where('status','0')
        ->latest()
        ->get();

        return view($this->view_path.'index',compact('data'));
    }

    public function productDetails($slug){
        // dd('ok');
        // return view($this->view_path.'product_details');
        $data['products'] = Product::where('slug',$slug)->get();

        return view($this->view_path.'product_details',compact('data'));
    }

    public function subcategoryDetails(Request $request ,$cat_slug,$subcat_slug){
        $subcategory = Subcategory::where('slug',$subcat_slug)->first();
        $sub_cat_id = $subcategory->id;

        if(Request::get('sort')=='price_asc'){
            $data['product']= Product::where('subcategory_id',$sub_cat_id)->orderBy('price','asc')->get();
        }
        elseif(Request::get('sort')=='price_desc'){
            $data['product']= Product::where('subcategory_id',$sub_cat_id)->orderBy('price','desc')->get();
        }
        elseif(Request::get('sort')=='newest'){
            $data['product']= Product::where('subcategory_id',$sub_cat_id)->orderBy('created_at','desc')->get();
        }
        else{
            $data['product']= Product::where('subcategory_id',$sub_cat_id)->get();
        }

        return view($this->view_path.'product.subcategory_details',compact('data','subcategory'));
    }

    public function productReview(Request $request){
        $request->validate([
            'comment'   =>'required|max:1000',
        ]);
        $product_review = ProductReview::create([
            'product_id'    =>$request->product_id,
            'user_id'       =>auth()->user()->id,
            'comment'       =>$request->comment,
        ]) ;
        $product_review_html = view('frontend.product.product_review',compact('product_review'))->render();
        return response()->json(['product_review_html'=>$product_review_html]);

        // return back();
    }

    public function deleteProductReview(Request $request, $id){
        $product_review = ProductReview::findOrFail($id);
        $product_review->delete();
        return back();
    }

    public function reviewReply(Request $request){
        ProductReviewReply::create([
            'product_review_id' =>$request->product_review_id,
            'product_id'        =>$request->product_id,
            'user_id'           =>auth()->user()->id,
            'comment'           =>$request->comment,
        ]);
        return back();
    }

    public function deleteProductReviewReply(Request $request, $id){
        $product_review_reply = ProductReviewReply::findOrFail($id);
        $product_review_reply->delete();
        return back();
    }

    public function cart(){
        $data =[];
        return view($this->view_path.'product.cart',compact('data'));
    }

    public function addToCart(Request $request){
        $product = Product::find($request['product_id']);

        Cart::create([
            'product_id'    =>$request->product_id,
            'price'         =>$product->price,
            'quantity'      =>$request->quantity,
            'grand_total'   =>$product['price']*$request->quantity,
            'user_id'       =>auth()->user()->id,
        ]);
        return redirect(route('product.cart'));
    }

    public function cartDelete(){
        $cart = Cart::where('user_id',auth()->id())
        ->where('product_id',request('product_id'))
        ->first();
        $cart->delete();

        $grand_total = auth()->user()->carts()->sum('grand_total');
        return response()->json(['grand_total'=>$grand_total]);
    }

    public function cartUpdate(){
        $cart = Cart::where('user_id',auth()->id())
        ->where('product_id', request('product_id'))
        ->first();

        $grand_total = $cart->product->price * request('quantity');
        $cart->update(['quantity'=>request('quantity')]);
        $cart->update(['grand_total'=>$grand_total]);

        $sub_total = auth()->user()->carts()->sum('grand_total');
        return response()->json(['sub_total'=>$sub_total]);
    }

    public function couponApply(){

        $coupon= Coupon::query()
        ->where('start_date', '<=', now())
        ->where('expire_date', '>', now())
        ->where('code',request('coupon_no'))->first();

        if($coupon){
            auth()->user()->update(['coupon_id' => $coupon->id]);
            session()->flash('success_message','Coupon Applied Successfully');
        }
        else{
            session()->flash('error_message','Couopn is not Valid');
        }
        return back();

    }


}
