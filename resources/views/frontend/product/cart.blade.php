@extends('frontend.layouts.master')

@section('title')
Cart |Ecommerce
@endsection

@section('content')
<!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url('{{asset('assets/frontend/images/bg/2.jpg')}}') no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Cart</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Cart</span>
                                </nav>
                                @include('backend.includes.flash_message')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>S.n</th>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @if(auth()->user()->carts->count()>0)
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="images/product/4.png" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#">Vestibulum suscipit</a></td>
                                            <td class="product-price"><span class="amount">£165.00</span></td>
                                            <td class="product-quantity"><input type="number" value="1" /></td>
                                            <td class="product-subtotal">£165.00</td>
                                            <td class="product-remove"><a href="#">X</a></td>
                                        </tr>
                                        @else
                                        <tr >
                                            <td colspan="6"><h4 class="text-danger">No Cart </h4></td>
                                        </tr>
                                        @endif --}}

                                        @forelse(auth()->user()->carts as $cart )
                                            <tr>
                                            <td class="product-thumbnail">{{$loop->iteration}}</td>
                                            <td class="product-thumbnail"><a href="#"><img src="{{asset('images/product/'.$cart->product->productImages->first()->image)}}" alt="product img" width="100" /></a></td>
                                            <td class="product-name"><a href="#">{{$cart->product->name}}</a></td>
                                            <td class=""><input type="number" class="price" value="{{$cart->price}}" disabled></td>
                                            <td class="product-quantity"><input type="number" class="quantity" value="{{$cart->quantity}}" min="1" max="{{$cart->product->stock}}" /></td>
                                            <input type="hidden" class="stock" value="{{$cart->product->stock}}">
                                            <td class=""><input type="number" class="grand_total" value="{{$cart->grand_total}}"></td>
                                            <td class="product-remove">
                                                <a href="#" class="remove_item">X</a>
                                                <input type="hidden" class="product" value="{{$cart->product->id}}">
                                            </td>
                                        </tr>
                                        @empty
                                        <tr >
                                            <td colspan="6"><h4 class="text-danger"> Cart is Empty </h4></td>
                                        </tr>

                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <div class="buttons-cart">
                                        <input type="submit" value="Update Cart" />
                                        <a href="#">Continue Shopping</a>
                                    </div>
                                    <div class="coupon">
                                        <h3>Coupon</h3>
                                        <p>Enter your coupon code if you have one.</p>
                                        <form action="{{route('cart.coupon_code')}}" method="POST">
                                            @csrf
                                            <input type="text" name="coupon_no" placeholder="Coupon code" />
                                            <button type="submit" class="btn btn-success">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    <div class="cart_totals">
                                        <h2>Cart Totals</h2>
                                        <table>
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td>
                                                        @auth
                                                         <input type="number" class="sub_total" value="{{auth()->user()->carts()->sum('grand_total')}}" disabled>
                                                        @else Nrs: 0.00
                                                        @endauth

                                                     </td>
                                                </tr>

                                                @if(auth()->user()->carts()->count()>0)
                                                    <tr class="shipping">
                                                        @forelse ($shipping as $shippings)
                                                        <th>Shipping Type:
                                                            @if($shippings->shipping_type==0)
                                                            Flat =>
                                                            @if($shippings->shipping_type==1)
                                                            Percentage % =>
                                                            @if($shippings->shipping_type==0)
                                                            Free =>
                                                            @endif @endif @endif
                                                        </th>
                                                        <td>
                                                        <input type="text" id="shipping_type" class="shipping_type" value="{{$shippings->value ?? 0}}" disabled>
                                                        @empty
                                                        <th>Shipping Type:</th>
                                                        <td>
                                                            <input type="text" value="0" disabled>
                                                        </td>
                                                        @endforelse

                                                        </td>
                                                    </tr>


                                                @if(auth()->user()->userCoupon()->exists())
                                                @if(auth()->user()->carts()->count()>0)
                                                <tr class="shipping">
                                                    <th>Coupon</th>
                                                     <td><input type="number" class="coupon_amount" id="coupon_amount" value="{{$discount_coupon = auth()->user()->userCoupon->discount_amount}}"></td>

                                                </tr>
                                                @endif
                                                @endif


                                                <tr class="order-total">
                                                    <th>Grand Total Nrs:</th>
                                                    {{--  @php
                                                        $percentage = auth()->user()->carts->sum('grand_total')* $shippings->value/100;
                                                    @endphp  --}}
                                                    @php
                                                        $grand_total = auth()->user()->carts()->sum('grand_total');
                                                    @endphp
                                                    <td>
                                                        <input type="number" class="total_amount" id="total_amount" value="{{$grand_total}}" disabled>
                                                          {{--  <input type="text" value="@auth {{$grand_total + $shippings->value - $discount_coupon}} @else 0 @endauth " disabled>  --}}
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="checkout.html">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
@endsection

@section('script')
    <script>

        //quantiy plus/minus and update grand total
    $(document).ready(function(){
        $('.quantity').change(function(){
             let quantity = $(this).val();
             let price = $(this).parents('tr').find('.price').val();
             let grand_total_element = $(this).parents('tr').find('.grand_total');
             let total  = quantity*price;
             let stock = $(this).parents('tr').find('.stock').val();
             grand_total_element.val(total);

             let total_amount = parseInt($('#total_amount').val());
             let shipping_amount = $(this).parents('tr').find('.shipping_type').val();
             $('.total_amount').val(total);

             let product_id =$(this).parents('tr').find('.product').val();

             $.ajax({
                url: "{{route('product.cart_update')}}",
                data: {_token: "{{csrf_token()}}", product_id: product_id, quantity:quantity},
                dataType: "JSON",
                method: "POST",
                success: function(resp) {
                    $('.sub_total').val(resp.sub_total);

                    },
                });

        });

        //Grand Total
        $('.total_amount').change(function(e){
            e.preventDefault();
            let quantity = $(this).val();
             let price = $(this).parents('tr').find('.price').val();
             let grand_total_element = $(this).parents('tr').find('.grand_total');
             let total  = quantity*price;
             let stock = $(this).parents('tr').find('.stock').val();
             grand_total_element.val(total);

             let total_amount = parseInt($('#total_amount').val(total));
             let shipping_amount = $(this).parents('tr').find('.shipping_type').val();
             let coupon_amount = $(this).parents('tr').find('.coupon_amount').val();

             $('.total_amount').val(total + shipping_amount);
        })

        //remove item
       // $('.remove_item').click(function(){
       //     $(this).parents('tr').remove();

      //  });



        //Remove from database ajax

        $('.remove_item').on('click',function(e) {
            e.preventDefault();
            let product_id = $(this).next().val();
            let row = $(this);

                $.ajax({
                url: "{{route('product.cart_delete')}}",
                data: {_token: "{{csrf_token()}}", product_id: product_id},
                dataType: "JSON",
                method: "POST",
                success: function(resp) {
                        row.parents('tr').remove();
                        $('.sub_total').val(resp.grand_total);

                    },
                })

            });


    });
    </script>
@endsection
