@extends('frontend.layout.main')
@section('title','Home')

@section('content')

<div class="intro-slider-container mb-5">
    <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{
                        "dots": true,
                        "nav": false, 
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
        <div class="intro-slide" style="background-image: url(assets/images/demos/demo-4/slider/slide-1.png);">
            <div class="container intro-content">
                <div class="row justify-content-end">
                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                        <h3 class="intro-subtitle text-third">Deals and Promotions</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title">Beats by</h1>
                        <h1 class="intro-title">Dre Studio 3</h1><!-- End .intro-title -->

                        <div class="intro-price">
                            <sup class="intro-old-price">$349,95</sup>
                            <span class="text-third">
                                $279<sup>.99</sup>
                            </span>
                        </div><!-- End .intro-price -->

                        <a href="category.html" class="btn btn-primary btn-round">
                            <span>Shop More</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-lg-11 offset-lg-1 -->
                </div><!-- End .row -->
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->

        <div class="intro-slide" style="background-image: url(assets/images/demos/demo-4/slider/slide-2.png);">
            <div class="container intro-content">
                <div class="row justify-content-end">
                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                        <h3 class="intro-subtitle text-primary">New Arrival</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title">Apple iPad Pro <br>12.9 Inch, 64GB </h1><!-- End .intro-title -->

                        <div class="intro-price">
                            <sup>Today:</sup>
                            <span class="text-primary">
                                $999<sup>.99</sup>
                            </span>
                        </div><!-- End .intro-price -->

                        <a href="category.html" class="btn btn-primary btn-round">
                            <span>Shop More</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-md-6 offset-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .intro-content -->
        </div><!-- End .intro-slide -->
    </div><!-- End .intro-slider owl-carousel owl-simple -->

    <span class="slider-loader"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->

<div class="container">
    <h2 class="title text-center mb-4">Explore Popular Categories</h2><!-- End .title text-center -->

    <div class="cat-blocks-container">
        <div class="row">
            @foreach($latestcategories as $cats)
            <div class="col-6 col-sm-4 col-lg-2">
                <a href="category.html" class="cat-block">
                    <figure>
                        <span>
                            <img src="{{asset($cats->image)}}" width="50" alt="{{$cats->name}}">
                        </span>
                    </figure>

                    <h3 class="cat-block-title">{{$cats->name}}</h3><!-- End .cat-block-title -->
                </a>
            </div><!-- End .col-sm-4 col-lg-2 -->
            @endforeach


        </div><!-- End .row -->
    </div><!-- End .cat-blocks-container -->
</div><!-- End .container -->

<div class="mb-3"></div><!-- End .mb-5 -->

<div class="container new-arrivals">
    <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">New Arrivals</h2><!-- End .title -->
        </div><!-- End .heading-left -->

        <div class="heading-right">
            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
                </li>

            </ul>
        </div><!-- End .heading-right -->
    </div><!-- End .heading -->

    <div class="tab-content tab-content-carousel just-action-icons-sm">
        <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                @foreach($latestproducts as $latest)
                <div class="product product-2">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="{{asset($latest->image)}}" alt="Product image" class="product-image">
                        </a>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">{{$latest->category->name}}</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">{{$latest->name}}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            @if($latest->descounted_price != null)
                            Rs {{$latest->descounted_price}}
                            @else
                            Rs {{$latest->price}}
                            @endif
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 4 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                @endforeach

            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->

    </div><!-- End .tab-content -->
</div><!-- End .container -->

<div class="mb-6"></div><!-- End .mb-6 -->


<div class="bg-light pt-5 pb-6">
    <div class="container trending-products">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">Featured Products</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="trending-top-link" data-toggle="tab" href="#trending-top-tab" role="tab" aria-controls="trending-top-tab" aria-selected="true">Top Rated</a>
                    </li>

                </ul>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="row">
           

            <div class="col-xl-4-5col">
                <div class="tab-content tab-content-carousel just-action-icons-sm">
                    <div class="tab-pane p-0 fade show active" id="trending-top-tab" role="tabpanel" aria-labelledby="trending-top-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                            "nav": true, 
                                            "dots": false,
                                            "margin": 20,
                                            "loop": false,
                                            "responsive": {
                                                "0": {
                                                    "items":2
                                                },
                                                "480": {
                                                    "items":2
                                                },
                                                "768": {
                                                    "items":3
                                                },
                                                "992": {
                                                    "items":4
                                                }
                                            }
                                        }'>
                            @foreach($featuredproducts as $featured)
                            <div class="product product-2">
                                <figure class="product-media">
                                    <a href="product.html">
                                        <img src="{{asset($featured->image)}}" alt="Product image" class="product-image">
                                    </a>


                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{$featured->category->name}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.html">{{$featured->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        @if($featured->descounted_price != null)
                                        Rs {{$featured->descounted_price}}
                                        @else
                                        Rs {{$featured->price}}
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->


                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            @endforeach



                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                </div><!-- End .tab-content -->
            </div><!-- End .col-xl-4-5col -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .bg-light pt-5 pb-6 -->

<div class="mb-5"></div><!-- End .mb-5 -->

<div class="container for-you">
    <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">Recommendation For You</h2><!-- End .title -->
        </div><!-- End .heading-left -->

        <div class="heading-right">
            <a href="#" class="title-link">View All Recommendadion <i class="icon-long-arrow-right"></i></a>
        </div><!-- End .heading-right -->
    </div><!-- End .heading -->

    <div class="products">
        <div class="row justify-content-center">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <span class="product-label label-circle label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-4/products/product-10.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Headphones</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Beats by Dr. Dre Wireless Headphones</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="new-price">$279.99</span>
                            <span class="old-price">Was $349.99</span>
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 4 Reviews )</span>
                        </div><!-- End .rating-container -->

                        <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #666666;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #ff887f;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #6699cc;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #f3dbc1;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="assets/images/demos/demo-4/products/product-11.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Cameras & Camcorders</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">GoPro - HERO7 Black HD Waterproof Action</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $349.99
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <span class="product-label label-circle label-new">New</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-4/products/product-12.jpg" alt="Product image" class="product-image">
                            <img src="assets/images/demos/demo-4/products/product-12-2.jpg" alt="Product image" class="product-image-hover">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Smartwatches</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Apple - Apple Watch Series 3 with White Sport Band</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $214.49
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 0%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 0 Reviews )</span>
                        </div><!-- End .rating-container -->

                        <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #e2e2e2;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #f2bc9e;"><span class="sr-only">Color name</span></a>
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="assets/images/demos/demo-4/products/product-13.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Laptops</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Lenovo - 330-15IKBR 15.6"</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="out-price">$339.99</span>
                            <span class="out-text">Out Of Stock</span>
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 11 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="assets/images/demos/demo-4/products/product-14.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Digital Cameras</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Sony - Alpha a5100 Mirrorless Camera</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $499.99
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 50%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 11 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="assets/images/demos/demo-4/products/product-15.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Laptops</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Home Mini - Smart Speaker with Google Assistant</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $49.00
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 24 Reviews )</span>
                        </div><!-- End .rating-container -->

                        <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #ef837b;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #e2e2e2;"><span class="sr-only">Color name</span></a>
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <span class="product-label label-circle label-sale">Sale</span>
                        <a href="product.html">
                            <img src="assets/images/demos/demo-4/products/product-16.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Audio</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">WONDERBOOM Portable Bluetooth Speaker</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span class="new-price">$99.99</span>
                            <span class="old-price">Was $129.99</span>
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 4 Reviews )</span>
                        </div><!-- End .rating-container -->

                        <div class="product-nav product-nav-dots">
                            <a href="#" class="active" style="background: #666666;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #ff887f;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #6699cc;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #f3dbc1;"><span class="sr-only">Color name</span></a>
                            <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->

            <div class="col-6 col-md-4 col-lg-3">
                <div class="product product-2">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="assets/images/demos/demo-4/products/product-17.jpg" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                        </div><!-- End .product-action -->

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                            <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">Smart Home</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product.html">Google - Home Hub with Google Assistant</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            $149.00
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .products -->
</div><!-- End .container -->

<div class="mb-4"></div><!-- End .mb-4 -->

<div class="container">
    <hr class="mb-0">
</div><!-- End .container -->

<div class="icon-boxes-container bg-transparent">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon text-dark">
                        <i class="icon-rocket"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                        <p>Orders $50 or more</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon text-dark">
                        <i class="icon-rotate-left"></i>
                    </span>

                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                        <p>Within 30 days</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon text-dark">
                        <i class="icon-info-circle"></i>
                    </span>

                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                        <p>when you sign up</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon text-dark">
                        <i class="icon-life-ring"></i>
                    </span>

                    <div class="icon-box-content">
                        <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                        <p>24/7 amazing services</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-sm-6 col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .icon-boxes-container -->

@endsection