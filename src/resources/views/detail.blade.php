@extends('layouts.app')

@section('main')
<div class="main">
    <div class="left-side">
        <img src="{{ $product->image_url }}" alt="商品画像" class="product-image">
    </div>
    <div class="right-side">
        <h1 class="product-name">{{ $product->name }}</h1>
        <p class="brand-name">{{ $product->brand_name }}</p>
        <p class="price">¥{{ number_format($product->price) }}</p>
        <div class="icons">
            <div class="like-icon">
                <img src="/img/like.png" alt="いいねアイコン" class="like-btn">
                <p>{{ $product->likes_count }}</p>
            </div>
            <div class="comment-icon">
                <img src="/img/comment.png" alt="コメントアイコン">
                <p>{{ $product->comments_count }}</p>
            </div>
        </div>
        <button class="purchase-btn" onclick="location.href='{{ route('buy', $product->id) }}'">購入手続きへ</button>
        <h2 class="section-title">商品説明</h2>
        <p class="description">{{ $product->description }}</p>
        <h2 class="section-title">商品の情報</h2>
        <div class="product-info">
            <div class="info-row">
                <span class="info-label">カテゴリー：</span>
                <span class="info-value">{{ implode(', ', $product->categories->pluck('name')->toArray()) }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">商品の状態：</span>
                <span class="info-value">{{ $product->condition->name }}</span>
            </div>
        </div>
        <h2 class="section-title">コメント（{{ $product->comments_count }}）</h2>
        <div class="comments">
            @foreach ($product->comments as $comment)
            <div class="comment">
                <img src="{{ $comment->user->avatar }}" alt="ユーザーアイコン" class="user-avatar">
                <div class="comment-content">
                    <p class="user-name">{{ $comment->user->name }}</p>
                    <p>{{ $comment->content }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @auth
        <div class="comment-form">
            <textarea placeholder="コメントを入力" class="comment-input"></textarea>
            <button class="comment-btn">コメントを送信する</button>
        </div>
        @endauth
    </div>
</div>
@endsection