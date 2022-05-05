<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends BackendBaseController
{
    private $model;
    protected $base_route = 'category.';
    protected $view_path = 'backend.category.';
    protected $panel = 'Category';
    protected $img_path = 'images/category/';

    public function __construct(){
    $this->model = new Category();
    }
    public function index(){
        $data=[];
        $data['rows'] =$this->model->latest()->get();
        // return view($this->view_path.'index',compact('data'));
        return view($this->__loadDataToView($this->view_path.'index'),compact('data'));

    }

    public function create(){
        $data=[];
        // return view($this->view_path.'create',compact('data'));
        return view($this->__loadDataToView($this->view_path.'create'),compact('data'));

    }

    public function store(CategoryRequest $request){
        try{
            if($request->hasFile('image_field')){
                $image_name =$this->uploadImage($request);
                $request->request->add(['image'=>$image_name]);
            }

            $request->request->add(['created_by' => auth()->user()->id]);
            $this->model->create($request->all());
            session()->flash('success_message',$this->panel.' Inserted Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something Went Wrong');
        }

        return redirect()->route($this->base_route.'index');
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
        // return view($this->view_path.'edit',compact('data'));
        return view($this->__loadDataToView($this->view_path.'edit'),compact('data'));
    }

    public function update(CategoryRequest $request, $id){
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
}
