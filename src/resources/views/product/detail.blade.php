@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product/detail.css') }}">
@endsection

@section('content')

<div class="item-detail">

    <div class="item-left">

        <img src="{{ asset('storage/'.$product->image) }}">

    </div>

    <div class="item-right">

        <h2>{{ $product->name }}</h2>

        <p class="brand">
            {{ $product->brand }}
        </p>

        <p class="price">
            ¥{{ number_format($product->price) }} (税込)
        </p>


        <div class="icons">

            <form action="/like/{{ $product->id }}" method="POST">
                @csrf

                <button class="like-btn">
                    ♡
                </button>

            </form>

            <span>{{ $product->likes->count() }}</span>

            <span class="comment-icon">
                💬 {{ $product->comments->count() }}
            </span>

        </div>


        <a href="/purchase/{{ $product->id }}" class="buy-btn">
            購入手続きへ
        </a>


        <h3>商品説明</h3>

        <p>
            {{ $product->description }}
        </p>


        <h3>商品情報</h3>

        <p>
            カテゴリー
            @foreach($product->categories as $category)

            <span class="category">
                {{ $category->name }}
            </span>

            @endforeach
        </p>

        <p>
            商品の状態
            {{ $product->condition }}
        </p>


        <h3>
            コメント({{ $product->comments->count() }})
        </h3>


        @foreach($product->comments as $comment)

        <div class="comment">

            <div class="comment-user">

                <img src="{{ asset('storage/'.$comment->user->image) }}">

                <span>
                    {{ $comment->user->name }}
                </span>

            </div>

            <p class="comment-body">

                {{ $comment->comment }}

            </p>

        </div>

        @endforeach


        @auth

        <form action="/comment/{{ $product->id }}" method="POST">

            @csrf

            <h3>商品へのコメント</h3>

            <textarea name="comment"></textarea>

            <button class="comment-btn">
                コメントを送信する
            </button>

        </form>

        @endauth

    </div>

</div>

@endsection