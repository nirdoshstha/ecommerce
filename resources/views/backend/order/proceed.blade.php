@extends('backend.layouts.master',['page'=>'Proceed'])

@section('title')
Order Proceed
@endsection

@section('content')
<section class="py-4 px-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header py-4 d-flex justify-content-between ">
                    <div>
                        <h5 class="mb-0 "><strong></strong><span></span><span class="text-primary">Orders Status</span></h5></div>
                     </div>
        @if(session('status'))
        <div class="alert alert-success" role="alert">{{session('status')}}</div>
        @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">

            <div class="col-md-4 py-2 px-3">
                <div class="card p-3 border">
                    <h6>Tracking Status</h6>
                <p> </p>
                </div>
            </div>
            <div class="col-md-4 py-2 px-3">
                <div class="card p-3 border">
                    <h6>Current Status</h6>
                    <p>
                        @if($data['row']->status=='0')
                        <span class="text-danger">Order Pending</span>
                        @elseif($data['row']->status=='1')
                        <span class="text-success">Order Completed</span>
                        @elseif($data['row']->status=='2')
                         Order Cancelled :
                       {{--  {{$orders->cancel_reason}}  --}}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-4 py-2 px-3">
                <div class="card p-3 border">
                    <h6>Payment Status</h6>
                    <p>
                        @if($data['row']->payment_status=='0')
                        Status : {{_('Payment Pending')}}<br/>
                        Mode : {{$data['row']->payment_mode}}
                        @elseif($data['row']->payment_status=='1')
                        Status : {{_('Paid on Delivery')}}<br/>
                        Mode : {{$data['row']->payment_mode}}
                        @else
                        Status : {{_('Paid by Esewa')}}<br/>
                        Mode : {{$data['row']->payment_mode}}
                        @endif
                    </p>
                </div>
            </div>
<!--TRacking Status-->
            <div class="col-md-6 py-2 px-3">
                <div class="card p-3 border">
                    <h6>Payment Status Update</h6>

                        {{--  @if($orders->order_status=="1")
                        {{$orders->tracking_msg}}
                        @elseif($orders->order_status=="2")
                        {{$orders->tracking_msg}}
                        @else  --}}
                        <form action="{{route('order.payment_status',$data['row']->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group d-flex justify-content-between">
                        <select name="payment_status" class="custom-select w-75">
                            <option>--Select--</option>
                            {{--  <option value="Pending" {{$orders->tracking_msg=="Pending" ? 'selected':''}}>Pending</option>--}}
                            <option value="0" >Cash on delivery Pending</option>
                            <option value="1" >Cash on delivery Paid</option>
                            <option value="2" >Esewa Pending</option>
                            <option value="3" >Esewa Paid Success</option>
                            <option value="4" >Khalti Pending</option>
                            <option value="5" >Khalti Paid Success</option>
                        </select>

                        <button type="submit" class="btn btn-primary">Update</button>

                    </div>
                </form>
                        {{--  @endif  --}}
                </div>
            </div>
<!--End Tracking -->
<!--Start Order Cancel -->
            <div class="col-md-6 py-2 px-3">
                <div class="card p-3 border">
                    <h6>Order Status</h6>
                    <form action="{{route('order.order_status',$data['row']->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group d-flex justify-content-between">
                        <select name="status" class="custom-select w-75">
                            <option>--Select--</option>
                            {{--  <option value="Pending" {{$orders->tracking_msg=="Pending" ? 'selected':''}}>Pending</option>--}}
                            <option value="0" >Pending</option>
                            <option value="1" >Completed</option>
                        </select>

                        <button type="submit" class="btn btn-primary">Update</button>

                    </div>
                </form>
                </div>
            </div>
            <!--End Order Cancel -->

            <div class="col-md-6 py-2 px-3">
                <div class="card p-3 border">
                    <h6>Complete Order</h6>
                    <!--0 = Pending
                        1 = Completed
                        2 = Rejected
                    -->
                    <div>
                        @if($data['row']->status=="0")
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary px-3 py-2">Proceed To Finish This Order</a>
                        @elseif($data['row']->status=="1")
                        Order Completed
                        @elseif($data['row']->status=="2")
                        Order Cancelled ! So not allowed to complete this order.
                        @else
                        Nothing
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div>


<!--Modal-->
<!-- Button trigger modal -->
{{--  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>  --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($data['row']->payment_status=="0")
        <h6>
            <input type="checkbox" name="cash_received" required> Received Payment (Cash on Delivery)
        </h6>
        <p>Checked the Box to Confirm that you recieved the Cash from Customer, Close this Order.</p>
        @else
        <h5>The Payment has been done Online</h5>
         @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

          <!--End Modal-->
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
