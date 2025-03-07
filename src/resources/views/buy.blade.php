@extends('layouts.app')

@section('main')
<div class="main">
    <div class="left-side">
        <div class="product-info">
            <img src="{{ $item->image_url }}" alt="商品画像" class="product-image">
            <div class="product-details">
                <h2>{{ $item->name }}</h2>
                <p>¥{{ number_format($item->price) }}</p>
            </div>
        </div>
        <hr>
        <div class="payment-method">
            <label for="payment_method">支払い方法</label>
            <select id="payment_method" name="payment_method">
                <option value="">選択してください</option>
                <option value="convenience_store">コンビニ支払い</option>
                <option value="credit_card">カード支払い</option>
            </select>
        </div>
        <hr>
        <div class="shipping-address">
            <label for="address">配送先</label>
            <p>{{ $user->address }}</p>
            <a href="{{ route('address.edit') }}">変更する</a>
        </div>
    </div>
    <div class="right-side">
        <div class="summary">
            <h2>商品代金</h2>
            <p>¥{{ number_format($item->price) }}</p>
        </div>
        <div class="summary">
            <h2>支払い方法</h2>
            <p id="selected-payment-method">選択してください</p>
        </div>
        <button id="purchase-button" class="purchase-btn">購入する</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('payment_method').addEventListener('change', function() {
        const selectedMethod = this.options[this.selectedIndex].text;
        document.getElementById('selected-payment-method').innerText = selectedMethod;
    });

    document.getElementById('purchase-button').addEventListener('click', function() {
        // 購入処理の実装
    });
</script>
@endsection