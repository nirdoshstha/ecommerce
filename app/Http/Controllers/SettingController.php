<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;

class SettingController extends BackendBaseController
{
    private $model;
    protected $base_route = 'setting.';
    protected $view_path = 'backend.setting.';
    protected $panel = 'Setting';
    protected $img_path = 'images/setting/';

    public function __construct(){
    $this->model = new Setting();
    }

    public function create(){
        $data=[];
        $setting = $this->model->first();
        if($setting){
            return redirect()->route($this->base_route.'edit',$setting->id);
        }
        return view($this->__loadDataToView($this->view_path.'create'),compact('data'));
        // return view($this->view_path.'create',compact('data'));
    }

    public function store(SettingRequest $request){
        //try{
            if($request->hasFile('image_field')){
                $image_name =$this->uploadImage($request);
                $request->request->add(['logo'=>$image_name]);
            }

            $request->request->add(['created_by' => auth()->user()->id]);
            $setting = $this->model->create($request->all());
            session()->flash('success_message',$this->panel.' Inserted Successfully');
        //}
        //catch(\Exception $e){
          //  session()->flash('error_message','Something Went Wrong');
        //}

        return redirect()->route($this->base_route.'edit',$setting->id);
    }



    public function edit($id){
        $data = [];
        $data['rows']  = $this->model->findorFail($id);
        // return view($this->view_path.'edit',compact('data'));
        return view($this->__loadDataToView($this->view_path.'edit'),compact('data'));
    }

    public function update(SettingRequest $request, $id){
        $data['row']   = $this->model->findorFail($id);

        try{
            if($request->hasFile('image_field')){
                $this->deleteImage($data['row']->image);
                $image_name =$this->uploadImage($request);
                $request->request->add(['logo'=>$image_name]);
            }
            $request->request->add(['updated_by' => auth()->user()->id]);
            // $data['rows']   = $this->model->findorFail($id);
            $data['row']->update($request->all());
            session()->flash('success_message',$this->panel.' Update Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something went wrong');
        }
        return redirect()->back();
    }


}
