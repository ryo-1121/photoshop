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
                  <a class="d-block" href="{{ asset('storage/products/'.$product->image) }}" data-lightbox="product" title="Product item 1">
                    @if ($product->image !== null)
                    <img class="img-fluid" src="{{ asset('storage/products/'.$product->image) }}" alt="...">
                    @else
                    <img src="{{ asset('img/dummy.png')}}" class="w-100 img-fuild">
                    @endif
                  </a>
              </div>
            </div>
          </div>
        </div>
  
        <!-- PRODUCT DETAILS-->
        <div class="col-lg-6">
          <h1>{{$product->name}}</h1>
          <p class="text-muted lead">￥{{$product->price}} (tax included)</p>
          <p class="text-small mb-4">{{$product->description}}</p>
          @auth
          <form method="POST" action="{{route('carts.store')}}" class="m-3 align-items-end">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$product->id}}">
            <input type="hidden" name="name" value="{{$product->name}}">
            <input type="hidden" name="price" value="{{$product->price}}">
            <input type="hidden" name="image" value="{{$product->image}}">
            <input type="hidden" name="carriage" value="{{$product->carriage_flag}}">
            <input type="hidden" name="weight" value="0">
            <div class="row align-items-stretch mb-4">
              <div class="col-sm-5 pr-sm-0">
                <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white">
                  <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                  <div class="quantity">
                    <input class="form-control border-0 shadow-0 p-0" id="quantity" name="qty" type="number" min="1" value="1">
                  </div>
                </div>
              </div>
                <div class="col-sm-3 pl-sm-0">
                  <button type="submit" class="btn btn-dark btn-block">Add to cart</button>
                </div>
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
          </form>
          @endauth
        </div>
      </div>
      
      <!-- DETAILS TABS-->
      <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
        <li class="nav-item"><a class="nav-link active" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
      </ul>
      <div class="tab-content mb-5" id="myTabContent">
        <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
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
            @auth
            <div class="row">
              <form method="POST" action="/products/{{ $product->id }}/reviews">
                  {{ csrf_field() }}
                  <h5 class="nav-link">Evaluation</h5>
                  <select name="score" class="form-control m-2 review-score-color">
                      <option value="5" class="review-score-color">★★★★★</option>
                      <option value="4" class="review-score-color">★★★★</option>
                      <option value="3" class="review-score-color">★★★</option>
                      <option value="2" class="review-score-color">★★</option>
                      <option value="1" class="review-score-color">★</option>
                  </select>
                  <h5 class="nav-link">Review content</h5>
                  <textarea name="content" class="form-control m-2"></textarea>
                  <button type="submit" class="btn btn-dark btn-block">Add review</button>
              </form>
            </div>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/lightbox2/js/lightbox.min.js') }}"></script>
<script src="{{ asset('vendor/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('vendor/owl.carousel2/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
<script src="{{ asset('js/front.js') }}"></script>
@endsection