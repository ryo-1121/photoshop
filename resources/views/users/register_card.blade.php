<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/samazon.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <script src="https://kit.fontawesome.com/3723f06c66.js" crossorigin="anonymous"></script>
</head>
<body>
@component('components.header')
@endcomponent
<main class="py-4 mb-5">
    <div class="container">
        <div class="col-md-5">
            <span>
                <a href="{{ route('mypage') }}">MyPage</a> > 会員情報の編集
            </span>
        </div>
        <div class="d-flex justify-content-center">
            <div class="container w-50">
            @if(count($card) > 1)
                <h3>登録済みのクレジットカード</h3>
                <hr>
                <h4>{{ $card["brand"] }}</h4>
                <p>有効期限: {{ $card["exp_year"] }}/{{ $card["exp_month"] }}</p>
                <p>カード番号: ************{{ $card["last4"] }}</p>
            @endif
                <form action="/users/mypage/token" method="post">
                    @csrf
                    @if (empty($card))
                    <script type="text/javascript" src="https://checkout.pay.jp/" class="payjp-button" data-key="{{ ENV('PAYJP_PUBLIC_KEY') }}" data-on-created="onCreated" data-text="カードを登録する" data-submit-text="カードを登録する"></script>
                    @else
                    <script type="text/javascript" src="https://checkout.pay.jp/" class="payjp-button" style="background-color: black" data-key="{{ ENV('PAYJP_PUBLIC_KEY') }}" data-on-created="onCreated" data-text="カードを更新する" data-submit-text="カードを更新する"></script>
                    @endif
                </form>
            </div>
        </div>
    </div>
</main>

@component('components.footer')
@endcomponent
</body>
</html>