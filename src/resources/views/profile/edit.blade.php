@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile/edit.css') }}">
@endsection

@section('content')

<div class="profile-container">

    <h2 class="profile-title">プロフィール設定</h2>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="profile-image-area">

            @if(Auth::user()->image)
            <img src="{{ asset('storage/' . Auth::user()->image) }}" class="profile-image">
            @else
            <div class="profile-default"></div>
            @endif

            <label class="image-select">
                画像を選択する
                <input type="file" name="image">
            </label>

        </div>

        <div class="form-group">
            <label>ユーザー名</label>
            <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}">
        </div>

        <div class="form-group">
            <label>郵便番号</label>
            <input type="text" name="postcode" value="{{ old('postcode', Auth::user()->postcode) }}">
        </div>

        <div class="form-group">
            <label>住所</label>
            <input type="text" name="address" value="{{ old('address', Auth::user()->address) }}">
        </div>

        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" value="{{ old('building', Auth::user()->building) }}">
        </div>

        <button class="update-btn">
            更新する
        </button>

    </form>

</div>

@endsection