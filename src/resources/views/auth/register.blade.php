@extends('layouts.guest')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')

<div class="auth-container">

    <h2 class="auth-title">会員登録</h2>

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div class="form-group">
            <label class="form-label">お名前</label>
            <input type="text" name="name" class="form-input" value="{{ old('name') }}">
            @error('name')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">メールアドレス</label>
            <input type="email" name="email" class="form-input" value="{{ old('email') }}">
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">パスワード</label>
            <input type="password" name="password" class="form-input">
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">確認用パスワード</label>
            <input type="password" name="password_confirmation" class="form-input">
        </div>

        <button type="submit" class="login-btn">
            登録する
        </button>

    </form>

    <div class="register-link">
        <a href="{{ route('login') }}">
            ログインはこちら
        </a>
    </div>

</div>

@endsection