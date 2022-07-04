@extends('frontend.layouts.master')
@section('title')
Subcategory Details
@endsection

@section('content')
<!-- Start Our Product Area -->
<section class="htc__product__area shop__page ptb--130 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h1>Mobiles</h1>
                <div class="data-search-show"><strong>4</strong> items found in <strong>Mobiles</strong></div>

    <section id="breadcrumb">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>


              <li class="breadcrumb-item active" aria-current="page">{{$subcategory->categoryId->name}}</li>

              <li class="breadcrumb-item active" aria-current="page">{{$subcategory->name}}</li>

            </ol>
          </nav>
    </section>
     </div><!--col-->
</div>
        <div class="htc__product__container">
            <!-- Start Product MEnu -->
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" aria-label="Default select example">
                        <option selected>Search By Brand</option>
                        <option value="1">Samsung</option>
                        <option value="2">Nokia</option>
                        <option value="3">Vivo</option>
                      </select>
                </div>
                <div class="col-md-4">
                    <select name="forma" class="form-control" onchange="location = this.value;">
                        <option selected>Search By Sort</option>
                        <option value="{{URL::current()}}">All</option>
                        <option value="{{URL::current()."?sort=price_asc"}}">Sort By Price Low To High</option>
                        <option value="{{URL::current()."?sort=price_desc"}}">Sort By Price High To Low</option>
                        <option value="{{URL::current()."?sort=newest"}}">Sort By Newest </option>
                        <option value="{{URL::current()."?sort=popularity"}}">Sort By Popularity</option>
                       </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" aria-label="Default select example">
                        <option selected>Search By Product Title</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>

            </div>

            <!-- Start Filter Menu -->
            {{--  <div class="filter__wrap">
                <div class="filter__cart">
                    <div class="filter__cart__inner">
                        <div class="filter__menu__close__btn">
                            <a href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                        <div class="filter__content">
                            <!-- Start Single Content -->
                            <div class="fiter__content__inner">
                                <div class="single__filter">
                                    <h2>Sort By</h2>
                                    <ul class="filter__list">
                                        <li><a href="#default">Default</a></li>
                                        <li><a href="#accessories">Accessories</a></li>
                                        <li><a href="#bags">Bags</a></li>
                                        <li><a href="#chair">Chair</a></li>
                                        <li><a href="#decoration">Decoration</a></li>
                                        <li><a href="#fashion">Fashion</a></li>
                                    </ul>
                                </div>
                                <div class="single__filter">
                                    <h2>Size</h2>
                                    <ul class="filter__list">
                                        <li><a href="#xxl">XXL</a></li>
                                        <li><a href="#xl">XL</a></li>
                                        <li><a href="#x">X</a></li>
                                        <li><a href="#l">L</a></li>
                                        <li><a href="#m">M</a></li>
                                        <li><a href="#s">S</a></li>
                                    </ul>
                                </div>
                                <div class="single__filter">
                                    <h2>Tags</h2>
                                    <ul class="filter__list">
                                        <li><a href="#">All</a></li>
                                        <li><a href="#">Accessories</a></li>
                                        <li><a href="#">Bags</a></li>
                                        <li><a href="#">Chair</a></li>
                                        <li><a href="#">Decoration</a></li>
                                        <li><a href="#">Fashion</a></li>
                                    </ul>
                                </div>
                                <div class="single__filter">
                                    <h2>Price</h2>
                                    <ul class="filter__list">
                                        <li><a href="#">$0.00 - $50.00</a></li>
                                        <li><a href="#">$50.00 - $100.00</a></li>
                                        <li><a href="#">$100.00 - $150.00</a></li>
                                        <li><a href="#">$150.00 - $200.00</a></li>
                                        <li><a href="#">$300.00 - $500.00</a></li>
                                        <li><a href="#">$500.00 - $700.00</a></li>
                                    </ul>
                                </div>
                                <div class="single__filter">
                                    <h2>Color</h2>
                                    <ul class="filter__list sidebar__list">
                                        <li class="black"><a href="#"><i class="zmdi zmdi-circle"></i>Black</a></li>
                                        <li class="blue"><a href="#"><i class="zmdi zmdi-circle"></i>Blue</a></li>
                                        <li class="brown"><a href="#"><i class="zmdi zmdi-circle"></i>Brown</a></li>
                                        <li class="red"><a href="#"><i class="zmdi zmdi-circle"></i>Red</a></li>
                                        <li class="orange"><a href="#"><i class="zmdi zmdi-circle"></i>Orange</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>  --}}
            <!-- End Filter Menu -->
            <!-- End Product MEnu -->
            <div class="container">
            <div class="row col-10">
                <div class="product__list another-product-style">
                    <!-- Start Single Product -->
                    @foreach ($data['product'] as $subcategory  )

                    <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
                        <div class="product foo">
                            <div class="product__inner">
                                <div class="pro__thumb">
                                    <a href="#">
                                        <img src="{{asset('images/product/'.$subcategory->productImages->image)}}" alt="product images">
                                    </a>
                                </div>
                                <div class="product__hover__info">
                                    <ul class="product__action">
                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product__details">
                                <h2><a href="product-details.html">{{$subcategory->name}}</a></h2>
                                <ul class="product__price">
                                    <li class="old__price">Nrs :{{$subcategory->price}}</li>
                                    <li class="new__price">Nrs :{{$subcategory->price}}</li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single Product -->

                </div>
            </div>
            <!-- Start Load More BTn -->
            <div class="row mt--60">
                <div class="col-md-12">
                    <div class="htc__loadmore__btn">
                        <a href="#">load more</a>
                    </div>
                </div>
            </div>
            </div>
            <!-- End Load More BTn -->
        </div>
    </div>
</section>
<!-- End Our Product Area -->
@endsection

@section('script')
@endsection
