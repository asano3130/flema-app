@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile/profile.css') }}">
@endsection

@section('content')

<div class="profile-container">

    <div class="profile-header">

        @if($user->image)
        <img src="{{ asset('storage/'.$user->image) }}" class="profile-image">
        @else
        <div class="profile-default"></div>
        @endif

        <h2 class="username">
            {{ $user->name }}
        </h2>

        <a href="{{ route('profile.edit') }}" class="edit-btn">
            プロフィールを編集
        </a>

    </div>


    <div class="tab-menu">

        <span class="active">出品した商品</span>
        <span>購入した商品</span>

    </div>


    <div class="product-grid">

        @foreach($sellProducts as $product)

        <div class="product-card">

            <img src="{{ asset('storage/'.$product->image) }}">

            <p>
                {{ $product->name }}
            </p>

        </div>

        @endforeach

    </div>


</div>

@endsection