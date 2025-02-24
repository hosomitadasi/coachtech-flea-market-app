@extends('layouts.app')

@section('main')
<div class="main">
    <div class="item-container">
        <img src="item-image.jpg" alt="商品画像">
        <div class="item-info">
            <h2>商品名がここに入る</h2>
            <p>ブランド名</p>
            <p>￥47,000（税込）</p>
            <button>購入手続きへ</button>
            <h3>商品説明</h3>
            <p>カラー：グレー</p>
            <p>商品の状態は良好です。傷もありません。</p>
            <h3>商品情報</h3>
            <span>洋服</span> <span>メンズ</span>
            <h3>コメント</h3>
            <div class="comment">
                <p>admin</p>
                <p>こちらにコメントが入ります。</p>
            </div>
            <textarea placeholder="商品へのコメント"></textarea>
            <button>コメントを送信する</button>
        </div>
    </div>
</div>
@endsection