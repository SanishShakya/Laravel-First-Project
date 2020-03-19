@extends('layouts.frontend')

@section('title','Ecommerce Website')

@section('main-content')
<main class="main">
    <div class="owl-carousel owl-theme">
        <div class="item">
            <img src="{{asset('assets/frontend/assets/images/banners/banner-1.jpg')}}" alt=""/>
            <h2>Welcome to our Website</h2>
        </div>
        <div class="item">
            <img src="{{asset('assets/frontend/assets/images/banners/banner-1.jpg')}}" alt=""/>
        </div>
        <div class="item">
            <img src="{{asset('assets/frontend/assets/images/banners/banner-1.jpg')}}" alt=""/>
        </div>

    <section class="container-fluid">
        <div class="section-header mt-6">
            <h2 class="section-title">Shop By Category</h2>
            <h3 class="section-subtitle">Browse in all our categories</h3>
        </div>

        <div class="row row-sm mb-2">
            @foreach($data['categories'] as $category)
            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                <div class="product-category">
                    <a href="category.html">
                        <figure>
                            <img src="{{asset('backend/images/category/400_400_'.$category->image)}}">
                        </figure>
                        <div class="category-content">
                            <h3>Sunglasses</h3>
                            <span><mark class="count">8</mark> products</span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="bg-grey pt-3 pb-3">
        <div class="container-fluid mt-6 mb-5">
            <div class="row row-sm">
                <div class="col-6 col-lg-3">
                    <div class="home-banner">
                        <img src="{{asset('assets/frontend/assets/images/banners/home-banner1.jpg')}}">
                        <div class="home-banner-content content-left-bottom">
                            <h3>Sunglasses Sale</h3>
                            <h4>See all and find yours</h4>
                            <a href="category.html" class="btn" role="button">Shop By Glasses</a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="home-banner">
                        <img src="{{asset('assets/frontend/assets/images/banners/home-banner2.jpg')}}">
                        <div class="home-banner-content content-top-center">
                            <h3>Cosmetics Trends</h3>
                            <h4>Browse in all and find yours</h4>
                            <a href="category.html" class="btn" role="button">Shop By Cosmetics</a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="home-banner">
                        <img src="{{asset('assets/frontend/assets/images/banners/home-banner3.jpg')}}">
                        <div class="home-banner-content content-reverse content-center">
                            <h3>Fashion Summer Sale</h3>
                            <h4>Browse in all our categories</h4>
                            <a href="category.html" class="btn" role="button">Shop By Fashion</a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="home-banner">
                        <img src="{{asset('assets/frontend/assets/images/banners/home-banner4.jpg')}}">
                        <div class="home-banner-content boxed-content content-bottom-center">
                            <div class="info-group">
                                <h3>UP TO 70% IN ALL BAGS</h3>
                                <h4>Starting at $99</h4>
                            </div>
                            <a href="category.html" class="btn" role="button">Shop By Bags</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid">
        <div class="section-header mt-6">
            <h2 class="section-title">Latest Products</h2>
            <h3 class="section-subtitle">Check all our popular products</h3>
        </div>

        <div class="row row-sm mb-10">
            @foreach($data['latest_products'] as $latest_product)
            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                <div class="product-default inner-quickview inner-icon">
                    <figure>
                        <a href="product.html">
                            @if($latest_product->images->first())
                            <img src="{{asset('backend/images/product/'.$latest_product->images->first()->image)}}">
                            @endif
                        </a>
                        <div class="label-group">
                            <span class="product-label label-cut">27% OFF</span>
                        </div>
                        <div class="btn-icon-group">
                            <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i></button>
                        </div>
                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                    </figure>
                    <div class="product-details">
                        <div class="category-wrap">
                            <div class="category-list">
                                <a href="category.html" class="product-category">category</a>
                            </div>
                        </div>
                        <h2 class="product-title">
                            <a href="product.html">{{$latest_product->name}}</a>
                        </h2>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .product-container -->
                        <div class="price-box">
                            <span class="old-price">{{$latest_product->price}}</span>
{{--                            <span class="product-price">$49.00</span>--}}
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
            </div>
            @endforeach
        </div>
    </section>
</main><!-- End .main -->
    @endsection

@section('js')
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                }
            }
        })
    </script>
@endsection
