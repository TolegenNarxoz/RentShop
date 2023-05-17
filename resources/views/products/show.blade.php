@extends('layouts.ind')

@section('title', 'Index page')

@section('content')

    <!-- Shop Section Start -->
    <section class="single-product-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div id="product-slider" class="carousel slide product-slider" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="ps-img">
                                    <img src="{{asset($product->img1)}}">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="ps-img">
                                    <img src="{{asset($product->img2)}}">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="ps-img">
                                    <img src="{{asset($product->img3)}}">
                                </div>
                            </div>
                        </div>
                        <ol class="carousel-indicators clearfix">
                            <li data-target="#product-slider" data-slide-to="0" class="active"><img src="{{$product->img1}}" alt=""></li>
                            <li data-target="#product-slider" data-slide-to="1"><img src="{{$product->img2}}" alt=""></li>
                            <li data-target="#product-slider" data-slide-to="2"><img src="{{$product->img3}}" alt=""></li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="sin-product-details">
                        <h3>{{$product->name}}</h3>
                        <div class="product-price clearfix">
                                <span class="price">
                                    <span><span class="woocommerce-Price-currencySymbol">$</span>{{$product->price}}</span>
                                </span>
                        </div>

                        <div class="pro-excerp">
                            <p>
                                {{$product->content}}
                            </p>
                        </div>
                        @can('rent', $product)
                            <div class="product-price clearfix">
                                <span class="price">
                                    <span><span class="woocommerce-Price-currencySymbol"></span>
                                    You already have an active subscription</span>
                                </span>
                            </div>
                        @endcan
                        <div class="product-cart-qty">
                            <form action="{{route('products.subscribe', $product->id)}}" method="POST">
                                @csrf
                                <select name="day">
                                    <option value="1">1 day</option>
                                    <option value="2">2 day</option>
                                    <option value="3">3 day</option>
                                    <option value="4">4 day</option>
                                    <option value="5">5 day</option>
                                    <option value="6">6 day</option>
                                    <option value="7">7 day</option>
                                </select>
                                <br>
                                <br>
                                <button class="add-to-cart-btn">Subscribe</button>
                            </form>
                            @can('update', $product)
                            <a href="{{route('products.edit', $product->id)}}" class="add-to-cart-btn">Edit</a>
                                <br>
                                <br>
                            @endcan
                            @can('delete', $product)
                            <form action="{{route('products.destroy', $product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="add-to-cart-btn">Delete</button>
                            </form>
                            @endcan
                        </div>
                        <div class="pro-socila">
                            <a href="#"><i class="twi-facebook"></i></a>
                            <a href="#"><i class="twi-twitter-square"></i></a>
                            <a href="#"><i class="twi-pinterest-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

@endsection
