<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AttributeRequest;

class AttributeController extends BackendBaseController
{
    private $model;
    protected $base_route = 'attributes.';
    protected $view_path = 'backend.attributes.';
    protected $panel = 'Attributes';
    protected $img_path = 'images/attributes/';

    public function __construct(){
    $this->model = new Attribute();
    }
    public function index(){
        $data=[];
        // $data['rows'] =$this->model->latest()->get();
        $data['rows'] = DB::table('attributes')->where('deleted_at',null)->get();
        // return view($this->view_path.'index',compact('data'));
        return view($this->__loadDataToView($this->view_path.'index'),compact('data'));

    }

    public function create(){
        $data=[];
        // return view($this->view_path.'create',compact('data'));
        return view($this->__loadDataToView($this->view_path.'create'),compact('data'));

    }

    public function store(AttributeRequest $request){
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

    public function update(AttributeRequest $request, $id){
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

    public function trash(){
        $data['row'] =$this->model->onlyTrashed()->latest()->get();
        return view($this->__loadDataToView($this->view_path.'.trash'), compact('data'));
    }

    public function restore(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data['rows'] = $this->model->withTrashed()->find($id)->restore();
            DB::commit();

            return redirect()->route($this->base_route.'index')->with('success_message', $this->panel.' Restored Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route($this->base_route.'index')->with('error_message', $this->panel.' Restore Failed');
        }
    }

    public function forceDelete(Request $request, $id)
    {
        DB::beginTransaction();
        $data['row'] = $this->model->withTrashed()->find($id);
        try {
            $data['row']->forceDelete();
            DB::commit();

            return redirect()->route($this->base_route.'trash')->with('success_message', $this->panel.' Deleted Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route($this->base_route.'trash')->with('error_message', $this->panel.' Restore Failed');
        }
    }
}
