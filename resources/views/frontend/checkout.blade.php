@extends('frontend.layouts.master')
@section('title')
Checkout Page |
@endsection

@section('content')
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{asset('assets/frontend/images/bg/2.jpg')}}) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Checkout</h2>
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="{{route('frontend.index')}}">Home</a>
                          <span class="brd-separetor">/</span>
                          <span class="breadcrumb-item active">Checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Checkout Area -->
<section class="our-checkout-area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <form action="{{route('cart.checkout_order')}}" method="POST">
                    @csrf
                <div class="ckeckout-left-sidebar">
                    <!-- Start Checkbox Area -->
                    <div class="checkout-form">
                        <h2 class="section-title-3">Billing details</h2>
                        <div class="checkout-form-inner">
                            <div class="single-checkout-box">
                                <input type="text" name="name" value="{{auth()->user()->name}}" placeholder="First Name*">
                                <input type="text" name="lname" value="{{auth()->user()->lname ?? ''}}" placeholder="Last Name*">
                            </div>
                            <div class="single-checkout-box">
                                <input type="email" name="email" value="{{auth()->user()->email}}" placeholder="Email*">
                                <input type="text" name="phone" value="{{auth()->user()->phone ?? ''}}" placeholder="Phone*">
                            </div>
                            <div class="single-checkout-box">
                                <textarea name="message" placeholder="Message*">{{auth()->user()->message ?? ''}}</textarea>
                            </div>
                            <div class="single-checkout-box select-option mt--40">
                                <input type="text" name="address" value="{{auth()->user()->address ?? ''}}" placeholder="Address*">
                            </div>

                        </div>
                    </div>
                    <!-- End Checkbox Area -->
                    <!-- Start Payment Box -->

                    <!-- End Payment Box -->
                    <!-- Start Payment Way -->
                    <div class="our-payment-sestem">
                        <h2 class="section-title-3">We  Accept :</h2>
                        <ul class="payment-menu">
                            <li class="d-flex justify-content-between"><a href="#"><img src="{{asset('assets/frontend/images/payment/esewa.png')}}" alt="Esewa" width="100"></a>
                            <input type="checkbox" name="payment_mode" value="Esewa" class="form-check-input">
                        </li>

                            <li class="d-flex justify-content-around">
                                <a href="#"><img src="{{asset('assets/frontend/images/payment/khalti.png')}}" alt="Khalti-img" width="100"></a>
                                <input type="checkbox" name="payment_mode" value="Khalti" class="form-check-input ml-4" >
                        </li>
                        <li class="d-flex justify-content-between"><a href="#">Cash on delivery</a>
                            <input type="checkbox" name="payment_mode" value="Cash on delivery" class="form-check-input">
                        </li>

                        </ul>
                        <div class="checkout-btn text-center">
                            <button type="submit" class="btn bnt-info">CONFIRM & BUY NOW</button>
                        </div>
                    </div>
                    <!-- End Payment Way -->
                </div>
            </form>
            </div>


            <div class="col-md-4 col-lg-4">
                <div class="checkout-right-sidebar">
                    <div class="puick-contact-area">
                <h3 class="section-title-3">Order Details</h3>
            </div>
                    <table class="table table-striped table-hover table-bordered-danger">
                        <thead>
                          <th>S.n</th>
                          <th>Name</th>
                          <th>Qty</th>
                          <th>Price (Nrs)</th>
                          <th>Total (Nrs)</th>

                        </thead>
                        <tbody>
                            @foreach (auth()->user()->carts as $cart )
                                <tr class="table-active">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$cart->product->name}}</td>
                                    <td>{{$cart->quantity}}</td>
                                    <td>{{$cart->price}}</td>
                                    <td>{{$cart->grand_total}}</td>
                                </tr>
                           @endforeach
                          <tr class="bg-success">
                            <td colspan="4" class="table-active">Sub Total</td>
                            <td>{{auth()->user()->carts()->sum('grand_total')}}</td>
                          </tr>
                        </tbody>
                      </table>
                    <div class="puick-contact-area mt--60">
                        <h2 class="section-title-3">Quick Contract</h2>
                        <a href="phone:+9801014247">9801014247</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
@endsection
