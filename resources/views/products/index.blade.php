@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-2">
        @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
        @endcomponent
    </div>
    <div class="col-9">
        <div class="container">
            @if ($category !== null)
                <a href="/">トップ</a> > <a href="#">{{ $category->major_category_name }}</a> > {{ $category->name }}
                <h1>{{ $category->name }}の商品一覧{{$products->count()}}件</h1>

                <form method="GET" action="{{ route('products.index')}}" class="form-inline">
                    <input type="hidden" name="category" value="{{ $category->id }}">
                    並び替え
                    <select name="sort" onChange="this.form.submit();" class="form-inline ml-2">
                        @foreach ($sort as $key => $value)
                            @if ($sorted == $value)
                               <option value=" {{ $value}}" selected>{{ $key }}</option>
                            @else
                               <option value=" {{ $value}}">{{ $key }}</option>
                            @endif
                        @endforeach
                    </select>
                </form>
            @endif
        </div>
        <div class="container mt-4">
            <div class="row w-100">
                @foreach($products as $product)
                <div class="col-3">
                    <a href="{{route('products.show', $product)}}">
                        @if ($product->image !== "")
                        <!--<img src="{{ asset('storage/products/'.$product->image) }}" class="img-thumbnail">-->
                        <canvas id="preview{{ $loop->index }}" class="img-thumbnail"></canvas>

                        <script>
                        //キャンバスに画像を描画する
                        document.addEventListener("DOMContentLoaded",function () {
                          //画像を読み込んでImageオブジェクトを作成する
                          let image = new Image();
                          image.src = "{{ asset('storage/products/'.$product->image) }}";
                          console.log(image.src);
                          image.onload = (function () {
                            //画像ロードが完了してからキャンバスの準備をする
                            let canvas = document.getElementById("preview{{ $loop->index }}");
                            let ctx = canvas.getContext('2d');
                            //キャンバスのサイズを画像サイズに合わせる
                            canvas.width = image.width;
                            canvas.height = image.height;
                            //キャンバスに画像を描画（開始位置0,0）
                            ctx.drawImage(image, 0, 0);
                            const text = "sample";
                            //文字のスタイルを指定
                            ctx.font = '32px serif';
                            ctx.fillStyle = '#fff';
                            //文字の配置を指定（左上基準にしたければtop/leftだが、文字の中心座標を指定するのでcenter
                            ctx.textBaseline = 'center';
                            ctx.textAlign = 'center';
                            //座標を指定して文字を描く（座標は画像の中心に）
                            let x = (canvas.width / 2);
                            let y = (canvas.height / 2);
                            ctx.fillText(text, x, y);
                          });
                        });
                        </script>
                        @else
                        <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                        @endif
                    </a>
                    <div class="row">
                        <div class="col-12">
                            <p class="samazon-product-label mt-2">
                                {{$product->name}}<br>
                                <label>￥{{$product->price}}</label>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{ $products->links() }}
    </div>
</div>

@endsection