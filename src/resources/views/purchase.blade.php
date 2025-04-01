@extends('layouts.app')

@section('main')
<div class="purchase-container">
    <div class="product-detail">
        <img src="{{ $item->image_url }}" alt="商品画像" class="product-image">
        <div class="product-info">
            <h2 class="product-name">{{ $item->name }}</h2>
            <p class="product-price">￥{{ number_format($item->price) }}（税込）</p>
        </div>
    </div>
    <hr class="divider">
    <div class="payment-method">
        <label for="payment_method">支払い方法</label>
        <select id="payment_method" name="payment_method">
            <option value="convenience_store">コンビニ払い</option>
            <option value="credit_card">カード払い</option>
        </select>
    </div>
    <hr class="divider">
    <div class="shipping-address">
        <label for="shipping_address">配送先</label>
        <p>{{ Auth::user()->zip_code }}, {{ Auth::user()->address }}, {{ Auth::user()->building }}</p>
        <a href="{{ route('address.update') }}">変更する</a>
    </div>
    <hr class="divider">
    <div class="order-summary">
        <div class="summary-item">
            <p>商品代金</p>
            <p>￥{{ number_format($item->price) }}</p>
        </div>
        <div class="summary-item">
            <p>支払い方法</p>
            <p id="selected-payment-method">コンビニ払い</p>
        </div>
        <button class="purchase-btn" onclick="document.getElementById('purchase-form').submit();">購入する</button>
    </div>
    <form id="purchase-form" action="{{ route('purchase.store') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="item_id" value="{{ $item->id }}">
        <input type="hidden" name="payment_method" id="hidden-payment-method" value="convenience_store">
        <input type="hidden" name="address" value="{{ Auth::user()->address }}">
    </form>
</div>
@endsection

<script>
    document.getElementById('payment_method').addEventListener('change', function() {
        var selected = this.options[this.selectedIndex].text;
        document.getElementById('selected-payment-method').innerText = selected;
        document.getElementById('hidden-payment-method').value = this.value;
    });
</script>