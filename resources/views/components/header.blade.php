<!-- navbar-->
<header class="header bg-white">
<div class="container px-0 px-lg-3">
  <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/logo_eng.png') }}">
      </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <!-- Link-->
          <a class="{{Request::is('/')?'active':''}} nav-link" href="{{ url('/') }}">Home</a>
            </li>
        <li class=" nav-item">
            <!-- Link-->
            <a class="{{ !request()->category ?'active':''}} nav-link" href="{{ route('products.index') }}">Shop</a>
        </li>
        <li class=" nav-item">
            <!-- Link-->
            <a class="{{ request()->category  == 1 ?'active':''}} nav-link" href="{{ route('products.index', ['category' => 1]) }}">Person</a>
        </li>
        <li class="nav-item">
          <!-- Link-->
          <a class="{{ request()->category  == 2 ?'active':''}} nav-link" href="{{ route('products.index', ['category' => 2]) }}">Animal</a>
        </li>
        <li class="nav-item">
          <!-- Link-->
          <a class="{{ request()->category  == 3 ?'active':''}} nav-link" href="{{ route('products.index', ['category' => 3]) }}">Food</a>
        </li>
        <li class="nav-item">
          <!-- Link-->
          <a class="{{request()->category  == 4 ?'active':''}} nav-link" href="{{ route('products.index', ['category' => 4]) }}">Nature</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"> <i
              class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray"></small></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"> <i
              class="far fa-heart mr-1"></i><small class="text-gray"> </small></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"> <i class="fas fa-user-plus mr-1 text-gray"></i>SignUp</a>
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a>
          @else
        <li class="nav-item"><a class="nav-link" href="{{ route('carts.index') }}"> <i
              class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray"></small></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('mypage.favorite') }}"> <i
              class="far fa-heart mr-1"></i><small class="text-gray"> </small></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('mypage') }}"> <i class="fas fa-user-alt mr-1 text-gray"></i>MyPage</a>
          @endguest
        </li>
      </ul>
    </div>
  </nav>
</div>
</header>