@extends('layouts.app')

@section('main')
<div class="main">
    <h1>商品購入</h1>
    <div class="purchase-info">
        <img src="item-image.jpg" alt="商品画像">
        <h2>商品名</h2>
        <p>￥47,000</p>
        <label>支払い方法</label>
        <select>
            <option>選択してください</option>
            <option>クレジットカード</option>
            <option>コンビニ払い</option>
        </select>
        <label>配送先</label>
        <p>〒XXX-YYYY</p>
        <p>ここには住所と建物が入ります</p>
        <button>購入する</button>
    </div>
</div>
@endsection