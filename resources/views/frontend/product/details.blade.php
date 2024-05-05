@extends('frontend.layout.main')
@section('title','Products')

@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Products</h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop</a></li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-gallery product-gallery-vertical">
                    <div class="row">
                        <figure class="product-main-image">
                            <img id="product-zoom" src="{{asset($product->image)}}" data-zoom-image="{{asset($product->image)}}" alt="product image">

                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                <i class="icon-arrows"></i>
                            </a>
                        </figure><!-- End .product-main-image -->


                    </div><!-- End .row -->
                </div><!-- End .product-gallery -->
            </div><!-- End .col-md-6 -->

            <div class="col-md-6">
                <div class="product-details">
                    <h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->

                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                    </div><!-- End .rating-container -->

                    <div class="product-price">
                        @if($product->descounted_price != null)
                        Rs {{$product->descounted_price}}
                        @else
                        Rs {{$product->price}}
                        @endif
                    </div><!-- End .product-price -->

                    <form action="">
                        <div class="details-filter-row details-row-size">
                            <label for="qty">Qty:</label>
                            <div class="product-details-quantity">
                                <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                            </div><!-- End .product-details-quantity -->
                        </div><!-- End .details-filter-row -->

                        <div class="product-details-action">
                           <button type="submit" class="btn-product btn-cart"> <span>add to cart</span></button>
                        </div><!-- End .product-details-action -->
                    </form>


                    <div class="product-details-footer">
                        <div class="product-cat">
                            <span>Category:</span>
                            <a href="#">{{$product->category->name}}</a>,

                        </div><!-- End .product-cat -->

                    </div><!-- End .product-details-footer -->
                </div><!-- End .product-details -->
            </div><!-- End .col-md-6 -->
        </div><!-- End .row -->
    </div><!-- End .product-details-top -->

    <div class="product-details-tab">
        <ul class="nav nav-pills justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                <div class="product-desc-content">
                    <h3>Product Information</h3>
                    <p>
                        {{$product->description}}
                    </p>

                </div><!-- End .product-desc-content -->
            </div><!-- .End .tab-pane -->

            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                <div class="reviews">
                    <h3>Reviews (2)</h3>
                    <div class="review">
                        <div class="row no-gutters">
                            <div class="col-auto">
                                <h4><a href="#">Samanta J.</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                </div><!-- End .rating-container -->
                                <span class="review-date">6 days ago</span>
                            </div><!-- End .col -->
                            <div class="col">
                                <h4>Good, perfect size</h4>

                                <div class="review-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                </div><!-- End .review-content -->

                                <div class="review-action">
                                    <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                    <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                </div><!-- End .review-action -->
                            </div><!-- End .col-auto -->
                        </div><!-- End .row -->
                    </div><!-- End .review -->

                    <div class="review">
                        <div class="row no-gutters">
                            <div class="col-auto">
                                <h4><a href="#">John Doe</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                </div><!-- End .rating-container -->
                                <span class="review-date">5 days ago</span>
                            </div><!-- End .col -->
                            <div class="col">
                                <h4>Very good</h4>

                                <div class="review-content">
                                    <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                </div><!-- End .review-content -->

                                <div class="review-action">
                                    <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                    <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                </div><!-- End .review-action -->
                            </div><!-- End .col-auto -->
                        </div><!-- End .row -->
                    </div><!-- End .review -->
                </div><!-- End .reviews -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .product-details-tab -->
</div>
@endsection