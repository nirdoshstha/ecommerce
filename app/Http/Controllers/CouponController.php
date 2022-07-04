<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests\CouponRequest;

class CouponController extends BackendBaseController
{
    private $model;
    protected $base_route = 'coupon.';
    protected $view_path = 'backend.coupon.';
    protected $panel = 'Coupon';
    protected $img_path = 'images/coupon/';

    public function __construct(){
    $this->model = new Coupon();
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
        $data['code'] = rand(1000,9999);
        return view($this->__loadDataToView($this->view_path.'create'),compact('data'));

    }

    public function store(CouponRequest $request){
        try{
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

    public function update(CouponRequest $request, $id){
        $data['rows']   = $this->model->findOrFail($id);

        try{

            $request->request->add(['updated_by' => auth()->user()->id]);
            // $data['rows']   = $this->model->findOrFail($id);
            $data['rows']->update($request->all());
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
            $data['row']->delete();
            session()->flash('success_message',$this->panel.' Deleted Successfully');
        }
        catch(\Exception $e){

            session()->flash('error_message','Something went wrong');
        }
        return redirect()->route($this->base_route.'index');
    }
}
