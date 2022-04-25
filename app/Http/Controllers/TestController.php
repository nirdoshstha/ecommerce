<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{
    private $model;
    public function __construct(){
        $this->model = new Test();
    }
    public function index(){
        $data=[];
        $data['rows'] =$this->model->latest()->get();
        return view('backend.test.index',compact('data'));
    }

    public function create(){
        $data=[];
        return view('backend.test.create',compact('data'));
    }

    public function store(TestRequest $request){

        try{
            $this->model->create($request->all());
            session()->flash('success_message','Data Inserted Successfully');
        }
        catch(\Exception $e){
            session()->flash('error_message','Something Went Wrong');
        }

        return redirect()->route('test.index');
    }

    public function show($id){
        $data = [];
        $data['rows'] = $this->model->findOrFail($id);
        return view('backend.test.show',compact('data'));
    }

    public function edit($id){
        $data = [];
        $data['rows']  = $this->model->findOrFail($id);
        return view('backend.test.edit',compact('data'));
    }

    public function update(TestRequest $request, $id){
        // $request->validate([
        //     'name'  =>'required|string|max:191',
        //     'email' =>'required',
        // ],[
        //     'name.required' =>'Please enter your name first',
        //     'email.required'    =>'Please enter your valid email address',
        // ]);

        try{

            $data['rows']   = $this->model->findOrFail($id);
            $data['rows']->update($request->all());
            session()->flash('success_message','Data Update Successfully');
        }
        catch(\Exception $e){

            session()->flash('error_message','Something went wrong');
        }
        return redirect()->route('test.index');
    }

    public function destroy($id){
        $data['row']   = $this->model->findOrFail($id);
        try{

            $data['row']->delete();
            session()->flash('success_message','Data Deleted Successfully');
        }
        catch(\Exception $e){

            session()->flash('error_message','Something went wrong');
        }
        return redirect()->route('test.index');
    }
}
