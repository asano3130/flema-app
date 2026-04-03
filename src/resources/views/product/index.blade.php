@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product/index.css') }}">
@endsection

@section('content')

<div class="item-container">

    <div class="tab-menu">

        <a href="/" class="{{ request('tab') != 'mylist' ? 'active' : '' }}">
            おすすめ
        </a>

        <a href="/?tab=mylist" class="{{ request('tab') == 'mylist' ? 'active' : '' }}">
            マイリスト
        </a>

    </div>


    <div class="item-grid">

        @foreach($products as $product)

        <div class="item-card">

            <a href="/item/{{ $product->id }}">

                <div class="image-box">

                    <img src="{{ asset('storage/'.$product->image) }}">

                    @if($product->buyer_id)
                    <span class="sold">Sold</span>
                    @endif

                </div>

                <p>{{ $product->name }}</p>

            </a>

        </div>

        @endforeach

    </div>

</div>

@endsection