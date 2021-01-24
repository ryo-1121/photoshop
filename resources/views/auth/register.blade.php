@extends('layouts.app')

@section('content')
<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
          <div class="col-lg-6">
            <h1 class="h2 text-uppercase mb-0">SignUp</h1>
          </div>
          <div class="col-lg-6 text-lg-right">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">SignUp</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5">
      <!-- BILLING ADDRESS-->
      <h2 class="h5 text-uppercase mb-4">Member information</h2>
      <div class="row">
        <div class="col-lg-8">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">

              <div class="col-lg-8 form-group">
                <label for="name" class="text-small text-uppercase">Name</label>
                <input id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Enter your name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>氏名を入力してください</strong>
                </span>
                @enderror
              </div>

              <div class="col-lg-8 form-group">
                <label class="text-small text-uppercase" for="email">Email address</label>
                <input id="email" class="form-control form-control-lg" id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="e.g. Jason@example.com">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>メールアドレスを入力してください</strong>
                    </span>
                    @enderror
              </div>

              <div class="col-lg-8 form-group">
                <label class="text-small text-uppercase" for="phone">Phone number</label>
                <input class="form-control form-control-lg" id="phone" type="tel" name="phone" placeholder="e.g. +08 245354745">
              </div>

              <div class="col-lg-8 form-group">
                <label class="text-small text-uppercase" for="address">Postal code</label>
                <input class="form-control form-control-lg" id="address" type="text" name="postal_code"  placeholder="e.g. 123-4567">
              </div>

              <div class="col-lg-12 form-group">
                <label class="text-small text-uppercase" for="address">Address</label>
                <input class="form-control form-control-lg" id="addressalt" type="text" name="address" placeholder="Apartment, Suite, Unit, etc (optional)">
              </div>

              <div class="col-lg-8 form-group">
                <label class="text-small text-uppercase" for="city">Password</label>
                <input class="form-control form-control-lg" id="password" type="password" name="password" autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>

              <div class="col-lg-8 form-group">
                <label for="password-confirm" class="text-small text-uppercase" for="state">Confirmation password</label>
                <input class="form-control form-control-lg" id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">
              </div>

              <div class="col-lg-6 form-group">
              </div>

              <div class="col-lg-12 form-group">
                <button class="btn btn-dark" type="submit">Create account</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
</div>
@endsection