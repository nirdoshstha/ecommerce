<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Exports\CategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\OrderRequest;
use App\Models\OrderProduct;
use PDF;

class OrderController extends BackendBaseController
{
    private $model;
    protected $base_route = 'order.';
    protected $view_path = 'backend.order.';
    protected $panel = 'Order';
    protected $img_path = 'images/order/';

    public function __construct(){
    $this->model = new Order();
    }
    public function index(){
        $data=[];
        $data['row'] =$this->model::all();
        $data['order_product'] = OrderProduct::all();
        // return view($this->view_path.'index',compact('data'));
        return view($this->__loadDataToView($this->view_path.'index'),compact('data'));
    }

    public function create(){
        $data=[];
        // return view($this->view_path.'create',compact('data'));
        return view($this->__loadDataToView($this->view_path.'create'),compact('data'));

    }

    public function store(OrderRequest $request){
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
        $data['row'] = $this->model->findOrFail($id);
        // return view($this->view_path.'show',compact('data'));
        return view($this->__loadDataToView($this->view_path.'show'),compact('data'));
    }

    public function proceed(Request $request, $id){
        $data['row']    =$this->model->findOrFail($id);
        return view($this->__loadDataToView($this->view_path.'proceed'),compact('data'));
    }

    public function edit($id){
        $data = [];
        $data['rows']  = $this->model->findOrFail($id);
        // return view($this->view_path.'edit',compact('data'));
        return view($this->__loadDataToView($this->view_path.'edit'),compact('data'));
    }

    public function update(OrderRequest $request, $id){
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

    public function updatePayment(Request $request, $id){
         $order = Order::find($id);
         $order->payment_status = $request->input('payment_status');
         $order->update();

        return redirect()->route($this->base_route.'index');
    }

    public function orderStatus(Request $request, $id){
        $order =Order::find($id);
        $order->status = $request->input('status');
        $order->update();
        return redirect()->route($this->base_route.'index');
    }

    public function generateInvoice($id){
        $order = Order::find($id);
        $data = ['order' => $order];
        $pdf =  PDF::loadView('backend.order.generate-invoice',$data);
        return $pdf->download('eShop.pdf');
    }


}
