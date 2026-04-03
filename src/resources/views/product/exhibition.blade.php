@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product/exhibition.css') }}">
@endsection

@section('content')

<div class="exhibition-container">

    <h1>商品の出品</h1>

    <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="image-area">

            <p>商品画像</p>

            <label class="image-upload">
                画像を選択する
                <input type="file" name="image">
            </label>

        </div>


        <h2>商品の詳細</h2>

        <p>カテゴリー</p>

        <div class="category-area">

            @foreach($categories as $category)

            <label class="category-btn">

                <input type="checkbox" name="categories[]" value="{{ $category->id }}">

                <span>{{ $category->name }}</span>

            </label>

            @endforeach

        </div>


        <p>商品の状態</p>

        <select name="condition" class="condition-select">

            <option value="">選択してください</option>
            <option value="良好">良好</option>
            <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
            <option value="やや傷や汚れあり">やや傷や汚れあり</option>
            <option value="状態が悪い">状態が悪い</option>

        </select>


        <h2>商品名と説明</h2>

        <p>商品名</p>

        <input type="text" name="name">

        <p>ブランド名</p>

        <input type="text" name="brand">

        <p>商品の説明</p>

        <textarea name="description"></textarea>

        <p>販売価格</p>

        <input type="number" name="price" placeholder="¥">

        <button class="submit-btn">
            出品する
        </button>

    </form>

</div>

@endsection