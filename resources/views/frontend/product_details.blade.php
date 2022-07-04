@extends('frontend.layouts.master')

@section('title')
Product Details |Ecommerce
@endsection

@section('content')

        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{asset('assets/frontend/images/bg/2.jpg')}}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Product Details</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Product Details</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($data['products'] as $product )
        <section class="htc__product__details pt--120 pb--100 bg__white">
            <div class="container">
                <div class="row">
                    @forelse ($data['products'] as $product )
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="product__details__container">
                            <!-- Start Small images -->
                            <ul class="product__small__images" role="tablist">
                                <li role="presentation" class="pot-small-img active">
                                    <a href="#img-tab-1" role="tab" data-toggle="tab">
                                        @if ($product->productImages->image)
                                        <img src="{{asset('images/product/'.'120_140_'.$product->productImages->first()->image)}}" alt="small-image">
                                        @else
                                            {{ 'Image Not Found' }}
                                        @endif

                                    </a>
                                </li>

                            </ul>
                            <!-- End Small images -->
                            <div class="product__big__images">
                                <div class="portfolio-full-image tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-tab-1">
                                        @if ($product->productImages->first()->image)
                                        <img src="{{asset('images/product/'.$product->productImages->first()->image)}}" alt="big-image">
                                        @else
                                            {{ 'Image Not Found' }}
                                        @endif

                                        <div class="product-video">
                                            <a class="video-popup" href="https://www.youtube.com/watch?v=cDDWvj_q-o8">
                                                <i class="zmdi zmdi-videocam"></i> View Video
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    'no image'
                    @endforelse
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                        <div class="htc__product__details__inner">
                            <div class="pro__detl__title">
                                <h2>{{$product->name}}</h2>
                            </div>
                            <div class="pro__dtl__rating">
                                <ul class="pro__rating">
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                    <li><span class="ti-star"></span></li>
                                </ul>
                                <span class="rat__qun">(Based on 0 Ratings)</span>
                            </div>
                            <div class="pro__details">
                                <p>{!!$product->short_description!!}</p>
                            </div>
                            <ul class="pro__dtl__prize">
                                <li class="old__prize">$15.21</li>
                                <li>${{$product->price}}</li>
                            </ul>
                            <div class="pro__dtl__color">
                                <h2 class="title__5">Choose Colour</h2>
                                <ul class="pro__choose__color">
                                    <li class="red"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                                    <li class="blue"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                                    <li class="perpal"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                                    <li class="yellow"><a href="#"><i class="zmdi zmdi-circle"></i></a></li>
                                </ul>
                            </div>
                            <div class="pro__dtl__size">
                                <h2 class="title__5">Size</h2>
                                <ul class="pro__choose__size">
                                    <li><a href="#">xl</a></li>
                                    <li><a href="#">m</a></li>
                                    <li><a href="#">ml</a></li>
                                    <li><a href="#">lm</a></li>
                                    <li><a href="#">xxl</a></li>
                                </ul>
                            </div>
                            <form action="{{route('product.add_to_cart')}}" id='form-cart' method='POST'>
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <div class="product-action-wrap">
                                        <div class="prodict-statas"><span>Quantity :</span></div>
                                        <div class="product-quantity">

                                                <div class="product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" type="number" name="quantity" min="1" max="5" value="1">
                                                    </div>
                                                </div>

                                        </div>
                                    </div>
                                    <ul class="pro__dtl__btn">
                                        <li class="buy__now__btn">
                                            <button type="button"  id="buy-confirm" class="btn btn-primary btn-lg"> Buy now</button>
                                        </li>
                                        <li><a href="#"><span class="ti-heart"></span></a></li>
                                        <li><a href="#"><span class="ti-email"></span></a></li>
                                    </ul>
                            </form>
                            <div class="pro__social__share">
                                <h2>Share :</h2>
                                <ul class="pro__soaial__link">
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="htc__product__details__tab bg__white pb--120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <ul class="product__deatils__tab mb--60" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#description" role="tab" data-toggle="tab">Description</a>
                            </li>
                            <li role="presentation">
                                <a href="#sheet" role="tab" data-toggle="tab">Data sheet</a>
                            </li>
                            <li role="presentation">
                                <a href="#reviews" role="tab" data-toggle="tab">Reviews</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product__details__tab__content">

                            <div role="tabpanel" id="description" class="product__tab__content fade in active">
                                <div class="product__description__wrap">
                                    <div class="product__desc">
                                        <h2 class="title__6">Details</h2>
                                        <p>{!!$product->description!!}</p>
                                    </div>
                                    <div class="pro__feature">
                                        <h2 class="title__6">Features</h2>
                                        <ul class="feature__list">
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Duis aute irure dolor in reprehenderit in voluptate velit esse</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Irure dolor in reprehenderit in voluptate velit esse</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Sed do eiusmod tempor incididunt ut labore et </a></li>
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Nisi ut aliquip ex ea commodo consequat.</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" id="sheet" class="product__tab__content fade">
                                <div class="pro__feature">
                                        <h2 class="title__6">Data sheet</h2>
                                        <ul class="feature__list">
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Duis aute irure dolor in reprehenderit in voluptate velit esse</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Irure dolor in reprehenderit in voluptate velit esse</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Irure dolor in reprehenderit in voluptate velit esse</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Sed do eiusmod tempor incididunt ut labore et </a></li>
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Sed do eiusmod tempor incididunt ut labore et </a></li>
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Nisi ut aliquip ex ea commodo consequat.</a></li>
                                            <li><a href="#"><i class="zmdi zmdi-play-circle"></i>Nisi ut aliquip ex ea commodo consequat.</a></li>
                                        </ul>
                                    </div>
                            </div>

                            <div role="tabpanel" id="reviews" class="product__tab__content fade">
                                <div class="review__address__inner">

                                 @foreach ($product->productReviews as $product_review )

                                 @include('frontend.product.product_review',['product_review' => $product_review])

                                    <div style="display: none" class="review_reply" id="form-comment-reply">
                                        <form action="{{route('product.review_reply')}}" method="post" id="form-review-reply">
                                            @csrf
                                            <input type="hidden" name="product_review_id" value="{{$product_review->id}}">
                                            <input type="hidden" name="product_id" value="{{$product->id}}">

                                            <div class="single-review-form ">
                                                <div class="review-box message" style="margin-left: 120px;">
                                                    <textarea name="comment" placeholder="Write your review's reply here " class="review-reply"></textarea>
                                                    <span class="text-danger">{{$errors->first('comment')}}</span>
                                                </div>
                                            </div>
                                            <div class="review-btn" style="margin-left: 120px;">
                                                <button type="submit" class="btn btn-primary"> Submit Review Reply</button>
                                            </div>
                                        </form>
                                    </div>
                                    @if(!$product_review->productReviewReplies()->exists())
                                        <hr>
                                    @endif


                                        @foreach ($product_review->productReviewReplies as $product_review_reply )

                                            <div class="pro__review ans">
                                                <div class="review__thumb">
                                                    @if (optional($product_review_reply->user->userProfile)->image)
                                                    <img src="{{ asset('images/user_profile/'.$product_review_reply->user->userProfile->image) }}" alt="review images" width="100" class="img-thumbnail">
                                                @else
                                                    <img src="{{ asset('assets/frontend/images/review/1.jpg') }}" alt="review images">
                                                @endif
                                                </div>
                                                <div class="review__details">
                                                    <div class="review__info">
                                                        <h4><a href="#">{{$product_review_reply->user->name}}</a></h4>

                                                        <div class="rating__send">
                                                            {{--  <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>  --}}
                                                            <form action="{{route('product.review_reply_destroy',['id'=>$product_review_reply->id])}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="#" class="delete-product-review-reply"><i class="zmdi zmdi-close"></i></a>
                                                            </form>



                                                        </div>
                                                    </div>
                                                    <div class="review__date">
                                                        <span>{{$product_review_reply->created_at->diffForHumans()}}</span>
                                                    </div>
                                                    <p>{{$product_review_reply->comment}}</p>
                                                </div>
                                            </div>
                                            @if($loop->last)
                                                <hr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>

                                <div class="review__box">
                                    <form action="{{route('product.store_review')}}" method="post" id="form-review">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">

                                        <div class="single-review-form">
                                            <div class="review-box message">
                                                <textarea name="comment" placeholder="Write your review"></textarea>
                                                <span class="text-danger">{{$errors->first('comment')}}</span>
                                            </div>
                                        </div>
                                        <div class="review-btn">
                                            <button type="button" class="fv-btn" id="submit_review"> Submit Review</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        @endforeach


        @include('frontend.includes.footer')

@endsection

@section('script')


<script>
    $( document ).ready(function()
    {
        //Buy Confirm
        $('#buy-confirm').click(function(){
            if(!'{{auth()->user()}}')
            {
                $('#loginModal').modal('show');
            }
            else{
                $('#form-cart').submit();
            }
        });

        //login Modal show
        $('#submit_review').click(function(){
            if(!'{{auth()->user()}}')
            {
                $('#loginModal').modal('show');
            }
            else{
                $('#form-review').submit();
            }
        });



        //comment reply toggle textarea show
        $('.comment-reply').click(function(){
            if(!'{{auth()->user()}}'){
                $('#loginModal').modal('show');
            }
            else{
                 $(".review_reply").toggle( 'slow' );
            }

        });

        //Delete Product Review
        $('.delete-product-review').click(function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $(this).closest("form").submit();
                }
              })
        })

        //Delete Product Review Reply
        $('.delete-product-review-reply').click(function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                  $(this).closest("form").submit();
                }
              })
        })
        //form submit
    $('form#form-review').on('submit', function(event) {
        event.preventDefault();
        let route = $(this).attr('action');
        let method = $(this).attr('method');
        let data = new FormData(this);
        $.ajax({
          url: route,
          data: data,
          method: method,
          dataType: "JSON",
          contentType: false,
          cache: false,
          processData: false,
          success: function(res) {
              let product_review_html = res.product_review_html;
            $('.review__address__inner').append(product_review_html);
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            );
          },
          error: function(err) {
            $('span.text-danger').remove();
            if (err.responseJSON.errors) {
              $.each(err.responseJSON.errors, function(key, value) {
                let splitted_key = key.split('.');
                if (splitted_key.length > 1) {
                  $("<span class='text-danger'>" + value + "<br></span>").insertAfter($("[name='" + splitted_key[0] + "[]']")[splitted_key[1]]);
                }
                $('#' + key).after("<span class='text-danger'>" + value + "<br></span>");
              });
            }
          },
        });
      });




    });

</script>



@endsection
