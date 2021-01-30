@extends('layouts.app')

@section('content')
<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
          <div class="col-lg-6">
            <h1 class="h2 text-uppercase mb-0">Cart</h1>
          </div>
          <div class="col-lg-6 text-lg-right">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5">
      <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
      <div class="row">
        <div class="col-lg-8 mb-4 mb-lg-0">
            
          <!-- CART TABLE-->
          <div class="table-responsive mb-4">
            <table class="table">
              <thead class="bg-light">
                <tr>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Quantity</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cart as $product)
                <tr>
                  <th class="pl-0 border-0" scope="row">
                    <div class="media align-items-center">
                        <a class="reset-anchor d-block animsition-link" href="{{route('products.show', $product->id)}}">
                            <img src="{{ asset('storage/products/'.$product->options->image) }}" alt="..." width="70"/>
                        </a>
                      <div class="media-body ml-3"><strong class="h6">
                          <a class="reset-anchor animsition-link" href="{{ asset('storage/products/'.$product->options->image) }}">{{$product->name}}</a></strong>
                      </div>
                    </div>
                  </th>
                  <td class="align-middle border-0">
                    <p class="mb-0 small">{{$product->price}}</p>
                  </td>
                  <td class="align-middle border-0">
                      <div class="quantity">
                          {{$product->qty}}
                      </div>
                    </div>
                  </td>
                  <td class="align-middle border-0">
                    <p class="mb-0 small">
                        @if ($product->carriage_flag)
                        ￥{{$product->qty * ($product->price + env('CARRIAGE'))}}
                        @else
                        ￥{{$product->qty * $product->price}}
                        @endif
                    </p>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <!-- CART NAV-->
          <div class="bg-light px-4 py-3">
            <div class="row align-items-center text-center">
              <div class="col-md-6 mb-3 mb-md-0 text-md-left">
                <a class="btn btn-link p-0 text-dark btn-sm" href="/"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue shopping</a>
              </div>
              <form method="post" action="{{route('carts.destroy')}}" class="d-flex justify-content-end mt-3">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <div class="col-md-6 text-md-right" data-toggle="modal" data-target="#buy-confirm-modal">
                  <a class="btn btn-outline-dark btn-sm" href="#">Procceed to checkout<i class="fas fa-long-arrow-alt-right ml-2"></i></a>
                </div>
                <div class="modal fade" id="buy-confirm-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">購入を確定しますか？</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn samazon-favorite-button border-dark text-dark" data-dismiss="modal">閉じる</button>
                        <button type="submit" class="btn btn-dark btn-block">購入</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- ORDER TOTAL-->
        <div class="col-lg-4">
          <div class="card border-0 rounded-0 p-lg-4 bg-light">
            <div class="card-body">
              <h5 class="text-uppercase mb-4">Cart total</h5>
              <ul class="list-unstyled mb-0">
                <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">￥{{$total}}</span></li>
                <li class="border-bottom my-2"></li>
                <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span>￥{{$total}}</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection