@extends('layouts.app')

@section('content')

<div class="page-holder bg-light">
  <section class="py-5">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-6">
  
          <!-- PRODUCT SLIDER-->
          <div class="row m-sm-0">
            <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
            </div>
            <div class="col-sm-10 order-1 order-sm-2">
              <div class="owl-carousel product-slider" data-slider-id="1">
                  <a class="d-block" href="img/product-detail-1.jpg" data-lightbox="product" title="Product item 1">
                    <img class="img-fluid" src="{{ asset('storage/products/'.$product->image) }}" alt="...">
                  </a>
              </div>
            </div>
          </div>
        </div>
  
        <!-- PRODUCT DETAILS-->
        <div class="col-lg-6">
          <!--<ul class="list-inline mb-2">-->
          <!--  <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>-->
          <!--  <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>-->
          <!--  <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>-->
          <!--  <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>-->
          <!--  <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>-->
          <!--</ul>-->
          <h1>{{$product->name}}</h1>
          <p class="text-muted lead">￥{{$product->price}} (tax included)</p>
          <p class="text-small mb-4">{{$product->description}}</p>
          @auth
            <div class="row align-items-stretch mb-4">
              <div class="col-sm-5 pr-sm-0">
                <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                  <div class="quantity">
                    <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                    <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                    <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                  </div>
                </div>
              </div>
              <form method="POST" action="{{route('carts.store')}}" class="m-3 align-items-end">
                <div class="col-sm-3 pl-sm-0">
                  <button type="submit" class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0">Add to cart</button>
                </div>
              </form>
            </div>
            @if($product->isFavoritedBy(Auth::user()))
              <a href="/products/{{ $product->id }}/favorite" class="btn btn-link text-dark p-0 mb-4">
                  <i class="far fa-heart mr-2"></i>
                  Remove to wish list
              </a>
            @else
              <a href="/products/{{ $product->id }}/favorite" class="btn btn-link text-dark p-0 mb-4">
                  <i class="far fa-heart mr-2"></i>
                  Add to wish list
              </a>
            @endif
          @endauth
        </div>
      </div>
      
      <!-- DETAILS TABS-->
      <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
        <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
        <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
      </ul>
      <div class="tab-content mb-5" id="myTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
          <div class="p-4 p-lg-5 bg-white">
            <h6 class="text-uppercase">Product description </h6>
            <p class="text-muted text-small mb-0">{{$product->description}}</p>
          </div>
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
          <div class="p-4 p-lg-5 bg-white">
            <div class="row">
              <div class="col-lg-8">
                @foreach($reviews as $review)
                <div class="media mb-3">
                  <div class="media-body ml-3">
                    <h6 class="mb-0 text-uppercase">{{$review->user->name}}</h6>
                    <p class="small text-muted mb-0 text-uppercase">{{$review->created_at}}</p>
                    <ul class="list-inline mb-1 text-xs">
                      @for ($i = 0; $i < $review->score; $i++)
                        <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                      @endfor
                    </ul>
                    <p class="text-small mb-0 text-muted">{{$review->content}}</p>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection