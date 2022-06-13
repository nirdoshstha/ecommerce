<section class="categories-slider-area bg__white">
    <div class="container">
        <div class="row">
            <!-- Start Left Feature -->
            <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
                <!-- Start Slider Area -->
                <div class="slider__container slider--one">
                    <div class="slider__activation__wrap owl-carousel owl-theme">
                        <!-- Start Single Slide -->
                        <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="background: rgba(0, 0, 0, 0) url({{asset('assets/frontend/images/slider/bg/slider.png')}}) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            <h1>New Product <span class="text--theme">Collection</span></h1>
                                            <div class="slider__btn">
                                                <a class="htc__btn" href="cart.html">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slide -->
                        <!-- Start Single Slide -->
                        <div class="slide slider__full--screen slider-height-inherit  slider-text-left" style="background: rgba(0, 0, 0, 0) url({{asset('assets/frontend/images/slider/bg/slider2.jpg')}}) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            <h1>New Product <span class="text--theme">Collection</span></h1>
                                            <div class="slider__btn">
                                                <a class="htc__btn" href="cart.html">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slide -->
                    </div>
                </div>
                <!-- Start Slider Area -->
            </div>
            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
                <div class="categories-menu mrg-xs">
                    <div class="category-heading">
                       <h3> Browse Categories</h3>
                    </div>
                    <div class="category-menu-list">
                        <ul>
                            @foreach ($data['categories'] as $category )
                            <li><a href="#"><img alt="" src="{{asset('assets/frontend/images/icons/thum2.png')}}"> {{$category->name}} <i class="zmdi zmdi-chevron-right"></i></a>
                                        <div class="category-menu-dropdown"> {{$category->sub_categories_count}}
                                            @foreach ($category->subCategories as $sub_categories )
                                                <div class="category-part-1 category-common mb--30">

                                                        <h4 class="categories-subtitle"> {{$sub_categories->name}}</h4>
                                                            <ul>
                                                                @foreach ($sub_categories->products as $products )
                                                                <li><a href="{{route('product_details',['slug'=>$products->slug])}}">{{$products->name}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                </div>
                                            @endforeach

                                        </div>
                            </li>

                            @endforeach
                            <li><a href="#"><img alt="" src="{{asset('assets/frontend/images/icons/thum7.png')}}"> Bags & Shoes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Left Feature -->
        </div>
    </div>
</section>
