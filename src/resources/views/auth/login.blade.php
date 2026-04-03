@extends('layouts.guest')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection


@section('content')

<div class="auth-container">

    <h2 class="auth-title">ログイン</h2>

    @if ($errors->has('email'))
    <div class="error-message">
        {{ $errors->first('email') }}
    </div>
    @endif

    @if ($errors->has('password'))
    <div class="error-message">
        {{ $errors->first('password') }}
    </div>
    @endif

    @if (session('error'))
    <div class="error-message">
        {{ session('error') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div class="form-group">
            <label class="form-label">メールアドレス</label>
            <input type="email" name="email" class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">パスワード</label>
            <input type="password" name="password" class="form-input">
        </div>

        <button type="submit" class="login-btn">
            ログインする
        </button>

    </form>

    <div class="register-link">
        <a href="{{ route('register') }}">会員登録はこちら</a>
    </div>

</div>

@endsection