@extends('layouts.app')

  @section('content')
  
  <!-- HERO SECTION-->
  <div class="container">
    <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url({{url('img/dummy1.png')}})">
      <div class="container py-5">
        <div class="row px-4 px-lg-5">
          <div class="col-lg-6">
            <p class="text-muted small text-uppercase mb-2">New Inspiration 2021</p>
            <h1 class="h2 text-uppercase mb-3" style="color: white">This site is a photo sales site</h1><a class="btn btn-dark" href="{{ route('products.index') }}">Browse collections</a>
          </div>
        </div>
      </div>
    </section>
    
    <!-- CATEGORIES SECTION-->
    <section class="pt-5">
      <header class="text-center">
        <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
        <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
      </header>
      <div class="row">
        <div class="col-md-4 mb-4 mb-md-0"><a class="category-item" href="{{ route('products.index', ['category' => 1]) }}"><img class="img-fluid" src="{{ asset('img/family.jpg')}}" alt=""><strong class="category-item-title">Person</strong></a></div>
        <div class="col-md-4 mb-4 mb-md-0"><a class="category-item mb-4" href=href="{{ route('products.index', ['category' => 2]) }}"><img class="img-fluid" src="{{ asset('img/lion.jpg')}}" alt=""><strong class="category-item-title">Animal</strong></a>
        <a class="category-item" href=href="{{ route('products.index', ['category' => 3]) }}"><img class="img-fluid" src="{{ asset('img/lake.jpg')}}" alt=""><strong class="category-item-title">Nature</strong></a></div>
        <div class="col-md-4"><a class="category-item" href=href="{{ route('products.index', ['category' => 4]) }}"><img class="img-fluid" src="{{ asset('img/pizza1.jpg')}}" alt=""><strong class="category-item-title">Food</strong></a></div>
      </div>
    </section>
    
    <!-- TRENDING PRODUCTS-->
    <section class="py-5">
      <header>
        <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
        <h2 class="h5 text-uppercase mb-4">Recommended products</h2>
      </header>
      <div class="row">

        <!-- PRODUCT-->
        @foreach ($recommend_products as $recommend_product)
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="text-center">
            <div class="position-relative mb-3">
                <a class="d-block" href="/products/{{ $recommend_product->id }}">
                    @if ($recommend_product->image !== "")
                    <img class="img-fluid w-100" src="{{ asset('storage/products/'.$recommend_product->image) }}" alt="...">
                    @else
                    <img class="img-fluid w-100" src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                    @endif
                </a>
            </div>
            <h6> 
                <a class="reset-anchor" href="detail.html">{{ $recommend_product->name }}</a>
            </h6>
            <p class="small text-muted">￥{{ $recommend_product->price }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </section>
    
    <!-- SERVICES-->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-4 mb-3 mb-lg-0">
            <div class="d-inline-block">
              <div class="media align-items-end">
                <svg class="svg-icon svg-icon-big svg-icon-light">
                  <use xlink:href="#delivery-time-1"> </use>
                </svg>
                <div class="media-body text-left ml-3">
                  <h6 class="text-uppercase mb-1">Free shipping</h6>
                  <p class="text-small mb-0 text-muted">After buying, you can download now!</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3 mb-lg-0">
            <div class="d-inline-block">
              <div class="media align-items-end">
                <svg class="svg-icon svg-icon-big svg-icon-light">
                  <use xlink:href="#helpline-24h-1"> </use>
                </svg>
                <div class="media-body text-left ml-3">
                  <h6 class="text-uppercase mb-1">24 x 365 service</h6>
                  <p class="text-small mb-0 text-muted">Open all year round!</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-inline-block">
              <div class="media align-items-end">
                <svg class="svg-icon svg-icon-big svg-icon-light">
                  <use xlink:href="#label-tag-1"> </use>
                </svg>
                <div class="media-body text-left ml-3">
                  <h6 class="text-uppercase mb-1">Festival offer</h6>
                  <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection