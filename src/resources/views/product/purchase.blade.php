@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product/purchase.css') }}">
@endsection

@section('content')

<div class="purchase-container">

    <div class="purchase-left">

        <div class="item-info">

            <div class="item-image">
                商品画像
            </div>

            <div class="item-detail">
                <h2>{{ $item->name }}</h2>
                <p class="price">¥ {{ number_format($item->price) }}</p>
            </div>

        </div>


        <hr>

        <h3>支払い方法</h3>

        <select id="payment-select" class="payment-select" name="payment_method">

            <option value="">選択してください</option>

            <option value="コンビニ払い">コンビニ払い</option>

            <option value="カード支払い">カード支払い</option>

        </select>

        <hr>

        <div class="address-area">

            <div class="address-header">
                <h3>配送先</h3>
                <a href="#">変更する</a>
            </div>

            <p>〒 {{ $postal_code }}</p>
            <p>{{ $address }}</p>

        </div>

    </div>


    <div class="purchase-right">

        <div class="summary">

            <div class="summary-row">
                <span>商品代金</span>
                <span>¥ {{ number_format($item->price) }}</span>
            </div>

            <div class="summary-row">
                <span>支払い方法</span>
                <span id="payment-method-text">未選択</span>
            </div>

        </div>

        <form action="{{ route('purchase.store',$item->id) }}" method="POST">

            @csrf

            <input type="hidden" name="payment_method" id="payment-hidden">

            <button class="purchase-button">
                購入する
            </button>

        </form>

    </div>

</div>

<script>
    const select = document.getElementById('payment-select');
    const text = document.getElementById('payment-method-text');
    const hidden = document.getElementById('payment-hidden');

    select.addEventListener('change', function() {

        text.textContent = this.value;
        hidden.value = this.value;

    });
</script>

@endsection