@extends('layouts.app')

@section('content')

  <div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
          <div class="col-lg-6">
            <h1 class="h2 text-uppercase mb-0">Shop</h1>
          </div>
          <div class="col-lg-6 text-lg-right">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                @if ($category !== null)
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                @endif
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    
    <section class="py-5">
      <div class="container p-0">
        <div class="row">
            
          <!-- SHOP SIDEBAR-->
          <div class="col-lg-3 order-2 order-lg-1">
            <h5 class="text-uppercase mb-4">Categories</h5>
            @foreach ($major_category_names as $major_category_name)
                <div class="py-2 px-4 bg-dark text-white mb-3">
                    <strong class="small text-uppercase font-weight-bold">{{ $major_category_name }}</strong>
                </div>
                @foreach ($categories as $category)
                    @if ($category->major_category_name === $major_category_name)
                        <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                            <li class="mb-2">
                              <a class="reset-anchor" href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                            </li>
                        </ul>
                     @endif
                @endforeach
            @endforeach
          </div>

          <!-- SHOP LISTING-->
          <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
            <div class="row mb-3 align-items-center">
              <div class="col-lg-6 mb-2 mb-lg-0 text-small text-muted mb-0">
                  @if ($category !== null)
                      <a href="/">Home</a> > <a href="#"> {{ $category->major_category_name }} </a> > {{ $category->name }}
                      <p class="text-small text-muted mb-0">List of {{$products->count()}} {{ $category->name }} results</p>
                  @endif
              </div>
              <div class="col-lg-6">
                <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                  <li class="list-inline-item text-muted mr-3">sort</li>
                  <li class="list-inline-item">
                    <select class="selectpicker ml-auto" name="sort" onChange="this.form.submit();" data-width="200" data-style="bs-select-form-control" data-title="Default sorting">
                        @foreach ($sort as $key => $value)
                            @if ($sorted == $value)
                               <option value=" {{ $value}}" selected>{{ $key }}</option>
                            @else
                               <option value=" {{ $value}}">{{ $key }}</option>
                            @endif
                        @endforeach
                    </select>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row">
                
              <!-- PRODUCT-->
              @foreach($products as $product)
              <div class="col-lg-4 col-sm-6">
                <div class="text-center">
                  <div class="mb-3 position-relative">
                    <div class="badge text-white badge-"></div>
                        <a class="d-block" href="{{ route('products.show', $product) }}">
                            @if ($product->image !== "")
                                <img class="img-fluid w-100" src="{{ asset('storage/products/'.$product->image) }}" alt="...">
                            @else
                                <img class="img-fluid w-100" src="{{ asset('img/dummy.png')}}" alt="...">
                            @endif
                        </a>
                  </div>
                  <h6> <a class="reset-anchor" href="detail.html">{{$product->name}}</a></h6>
                  <p class="small text-muted">￥{{$product->price}}</p>
                </div>
              </div>
              @endforeach
            </div>

            <!-- PAGINATION-->
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection