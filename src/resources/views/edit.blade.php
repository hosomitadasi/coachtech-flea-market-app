@extends('layouts.app')

@section('main')
<div class="product-detail">
    <div class="product-image-area">
        <img src="{{ $item->img_url }}" alt="{{ $item->name }}">
    </div>
    <div class="product-description-area">
        <div class="product-title">
            <div class="product-name">{{ $item->name }}</div>
            @if($item->brand)
            <div class="product-brand">{{ $item->brand }}</div>
            @endif
            <div class="product-price">￥{{ $item->price }}（税込）</div>
        </div>
        <div class="product-actions">
            <div class="action-icon">
                <img src="{{ asset('images/comment-icon.png') }}" alt="コメント">
                <div class="action-count">{{ $item->comments_count }}</div>
            </div>
            <div class="action-icon">
                <img src="{{ asset('images/like-icon.png') }}" alt="いいね">
                <div class="action-count">{{ $item->likes_count }}</div>
            </div>
        </div>
        <div class="purchase-area">
            <div class="purchase-box">
                <a href="{{ route('buy', $item->id) }}" class="purchase-link">購入手続きへ</a>
            </div>
        </div>
        <div class="product-description">
            <div class="description-title">商品説明</div>
            <div class="description-content">{{ $item->description }}</div>
        </div>
        <div class="product-info">
            <div class="info-title">商品の情報</div>
            <div class="category-info">カテゴリー：{{ $item->category }}</div>
            <div class="product-condition">状態：{{ $item->condition }}</div>
        </div>
        <div class="product-comments">
            <div class="comments-title">コメント（{{ $item->comments_count }}）</div>
            <div class="comment-list">
                @foreach($item->comments as $comment)
                <div class="comment-item">{{ $comment->content }}</div>
                @endforeach
            </div>
            @if(Auth::check())
            <div class="comment-input">
                <form action="{{ route('comment', $item->id) }}" method="POST">
                    @csrf
                    <textarea name="content" rows="4" placeholder="コメントを入力"></textarea>
                    <button type="submit">コメントを投稿</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection