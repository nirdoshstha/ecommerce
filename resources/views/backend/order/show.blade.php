@extends('backend.layouts.master',['page'=>'Show'])

@section('title','Show'.' '.$panel)


@section('content')

<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class=""><h5 class="mb-0 "><strong></strong><span></span><span class="text-primary">Order View Details</span></h5></div>
            <div class=""><a href="{{route('order.generate_invoice',$data['row']->id)}}" class="btn btn-info"><i class="fas fa-edit"></i>Generate Invoice</a></div>
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

            <div class="col-md-4 py-2">
                <div class="card p-3">
                    <h6>Order No<hr></h6>
                    <p>{{$data['row']->id}}</p>
                </div>
            </div>
            <div class="col-md-8 py-2">
                <div class="card p-3">
                    <h6>Order Date<hr></h6>
                    <p>{{$data['row']->created_at}} ({{$data['row']->created_at->diffForHumans()}})</p>
                </div>
            </div>

            <div class="col-md-4 py-2">
                <div class="card p-3">
                    {{-- 0 = COD - Pending
                    1 = COD - Paid
                    2 = E-sewa - Success
                    3 = E-sewa = Failed --}}
                    <h6>Payment Mode<hr></h6>
                    <p>{{$data['row']->payment_mode}}</p>
                </div>
            </div>
            <div class="col-md-4 py-2">
                <div class="card p-3">
                    <h6>Payment Status<hr></h6>

                    {{--  <p>
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
                    </p>  --}}
                    <p>
                      @if ($data['row']->payment_status=='0')
                        <span class="text-warning">Cash On Delivery - Pending</span>
                        @elseif($data['row']->payment_status=='1')
                        <span class="text-success">Cash On Delivery -Paid</span>
                        @elseif ($data['row']->payment_status=='2')
                        <span class="text-danger">Esewa Pending</span>
                        @elseif ($data['row']->payment_status=='3')
                        <span class="text-success">Esewa Success</span>
                        @elseif ($data['row']->payment_status=='4')
                        <span class="text-success">Khalti Pending</span>
                        @elseif ($data['row']->payment_status=='5')
                        <span class="text-success">Khalti Success</span>
                    @endif
                    </p>

                </div>
            </div>
            <div class="col-md-4 py-2">
                <div class="card p-3">
                    <h6>Payment ID<hr></h6>
                <p> </p>
                </div>
            </div>

            <div class="col-md-4 py-2">
                <div class="card p-3">
                    <h6>Order Status<hr></h6>
                    <!--0 = Pending
                        1 = Completed
                        2 = Rejected
                    -->
                    <p>
                        @if ($data['row']->status=='0')
                            <span class="text-warning"> Pending</span>
                            @elseif($data['row']->status=='1')
                            <span class="text-success">Completed</span>
                            @elseif ($data['row']->status=='2')
                            <span class="text-danger">Cancelled/Rejected</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-8 py-2">
                <div class="card p-3">
                    <h6>Cancelled Reason<hr></h6>
                    <p> </p>
                </div>
            </div>

        </div>
    </div>
<hr/>

<div class="container">
<div class="row">
    <div class="col-md-12">
        <h5 class= "text-primary">Ordered Items</h5>
        <table class="table table-bordered table-hover">
            <tr class="bg-primary text-light">
                <th>Order ID</th>
                <th>Product Id</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Sub Total</th>
            </tr>

            @foreach (auth()->user()->carts as $cart )
            <tr>
                <td> </td>
                <td>{{$cart->product_id}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}}</td>
                <td>{{$cart->price * $cart->quantity}}</td>
            </tr>

            @endforeach

            <tr>
                <td colspan="4">Shipping Charge:</td>
                {{--  Grand Total = Total Amount * tax/100  --}}
            <td>

                    {{--  @php
                        $tax = $orderitems->tax_amt;
                        $grandtotal =($total * $tax)/100;
                    @endphp
                    {{$grandtotal}}  --}}

            </td>
            </tr>

            <tr class="fw-bold fs-6">
                <td colspan="4" >Grand Amount:</td>
                <td>{{auth()->user()->carts->sum('grand_total')}}</td>
            </tr>
        </table>
    </div>
</div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
<div class="card">
    <div class="card-header py-4 d-flex justify-content-between ">
    <div><h5 class="mb-0 "><strong></strong><span></span><span class="text-primary">Customer Details</span></h5>
    </div>
         </div>

</div>
        </div>
    </div>
</div>


<div class="container py-3">
    <div class="row">

        <div class="col-md-4 py-2">
            <div class="card p-3">
                <h6>Customer Name<hr></h6>
            <p>{{$data['row']->first_name}}</p>
            </div>
        </div>
        <div class="col-md-4 py-2">
            <div class="card p-3">
                <h6>Customer Email<hr></h6>
            <p>{{$data['row']->email}}</p>
            </div>
        </div>

        <div class="col-md-4 py-2">
            <div class="card p-3">
                {{-- 0 = COD - Pending
                1 = COD - Paid
                2 = E-sewa - Success
                3 = E-sewa = Failed --}}
                <h6><b>Customer Phone</b><hr></h6>
                <p>{{$data['row']->phone}}</p>
            </div>
        </div>
        <div class="col-md-4 py-2">
            <div class="card p-3">
                <h6>Address<hr></h6>
                <p>{{$data['row']->address}}</p>
            </div>
        </div>

        <div class="col-md-8 py-2">
            <div class="card p-3">
                <h6>Message<hr></h6>
                <p>{{$data['row']->message}}</p>
            </div>
        </div>





    </div>
</div>
<hr/>
</section>
@endsection

@section('js')
@endsection
