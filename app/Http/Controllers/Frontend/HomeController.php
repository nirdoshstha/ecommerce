<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Http\Controllers\Controller;
use App\Models\ProductReviewReply;

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
}
