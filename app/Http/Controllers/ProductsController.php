<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Subcategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\ProductsRequest;
use App\Models\ProductAttributeDetails;

class ProductsController extends BackendBaseController
{
    private $model;
    protected $base_route = 'products.';
    protected $view_path = 'backend.products.';
    protected $panel = 'Products';
    protected $img_path = 'images/product/';

    public function __construct(){
    $this->model = new Product();
    }
    public function index(){
        $data=[];
        $data['rows'] =$this->model->with('categoryId','subcategoryId','tags','attributeDetails')->latest()->get();
        // return view($this->view_path.'index',compact('data'));
        return view($this->__loadDataToView($this->view_path.'index'),compact('data'));

    }

    public function create(){
        $data=[];
        $data['categories'] = Category::pluck('name','id');
        $data['subcategories'] = Subcategory::pluck('name','id');
        $data['tags'] = Tag::pluck('name','id');
        $data['attribute'] = Attribute::pluck('name','id');

        // return view($this->view_path.'create',compact('data'));
        return view($this->__loadDataToView($this->view_path.'create'),compact('data'));

    }

    public function store(ProductsRequest $request){
        try{
            DB::beginTransaction();
            $request->request->add(['created_by' => auth()->user()->id]);
            //To Store Product
            $product = $this->model->create($request->all());

            //To Store Product Attribute
            foreach ($request['attribute_id'] as $index =>$attribute_id){
            ProductAttributeDetails::create([
                'product_id'    =>$product->id,
                'attribute_id'  =>$attribute_id,
                'value'         =>$request['attribute_value'][$index],
            ]);
            }
            $product->tags()->attach($request['tag_id']);

            //Multple Image Uploaded
            foreach($request['image_field'] as $index=>$image)
            {
                if($request->hasFile('image_field'))
                {
                    $image_name = time().rand().'_'.$image->getClientOriginalName();
                    $image->move($this->img_path,$image_name);

                    //Image Resize
                    if($dimensions = config('image_dimension.product.image')){
                        foreach($dimensions as $dimension){
                            $image = Image::make($this->img_path. $image_name)->resize($dimension['width'], $dimension['height']);
                            $image->save($this->img_path.$dimension['width'].'_'.$dimension['height'].'_'. $image_name);
                        }
                    }


                    //Multible Image Save
                    ProductImage::create([
                        'product_id'    =>$product->id,
                        'name'          =>$request['image_name'][$index],
                        'image'         =>$image_name,
                    ]);

                }
            }

            DB::commit();
            session()->flash('success_message',$this->panel.' Inserted Successfully');
        }
        catch(\Exception $e){
            DB::rollback();
            session()->flash('error_message','Something Went Wrong');
        }

        return response()->json('Data Inserted Successfully');
        // return redirect()->route($this->base_route.'index');
    }

    public function show($id){
        $data = [];
        $data['rows'] = $this->model->findOrFail($id);
        // return view($this->view_path.'show',compact('data'));
        return view($this->__loadDataToView($this->view_path.'show'),compact('data'));

    }

    public function edit($id){

        $data = [];
        $data['rows']  = $this->model->findOrFail($id);
        $data['categories'] = Category::pluck('name','id');
        $data['subcategories'] = Subcategory::pluck('name','id');
        $data['tags'] = Tag::pluck('name','id');


        // return view($this->view_path.'edit',compact('data'));
        return view($this->__loadDataToView($this->view_path.'edit'),compact('data'));
    }

    public function update(ProductsRequest $request, $id){
        $data['row']   = $this->model->findOrFail($id);

        try{
            if($request->hasFile('image_field')){
                $this->deleteImage($data['row']->image);
                $image_name =$this->uploadImage($request);
                $request->request->add(['image'=>$image_name]);
            }
            $request->request->add(['updated_by' => auth()->user()->id]);
            // $data['rows']   = $this->model->findOrFail($id);
            $data['row']->update($request->all());
            $data['row']->tags()->sync($request['tag_id']);
            session()->flash('success_message',$this->panel.' Update Successfully');
        }
        catch(\Exception $e){

            session()->flash('error_message','Something went wrong');
        }
        return redirect()->route($this->base_route.'index');
    }

    public function destroy($id){
        $data['row']   = $this->model->findOrFail($id);
        try{
            $this->deleteImage($data['row']->image);
            $data['row']->delete();
            session()->flash('success_message',$this->panel.' Deleted Successfully');
        }
        catch(\Exception $e){

            session()->flash('error_message','Something went wrong');
        }
        return redirect()->route($this->base_route.'index');
    }

    public function getSubCategory(){
        $sub_category = Subcategory::where('category_id',request('category_id'))->pluck('name','id');
        return response()->json($sub_category);
    }
}
