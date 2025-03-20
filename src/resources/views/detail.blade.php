@extends('layouts.app')

@section('main')
<div class="product-detail">
    <div class="product-image-area">
        <img src="{{ $item->image_url }}" alt="商品画像" class="product-image">
    </div>

    <div class="product-description-area">

        <div class="product-title">
            <h1>{{ $item->name }}</h1>
            @if ($item->brand_name)
            <h2>{{ $item->brand_name }}</h2>
            @endif
            <p>￥{{ number_format($item->price) }}（税込）</p>
        </div>

        <div class="product-actions">
            <div class="action-icons">
                <div class="like-icon">
                    <form action="{{ route('like', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit">
                            <img src="/img/unlike.png" class="like-btn">
                        </button>
                        <p>{{ $likesCount }}</p>
                    </form>
                </div>
                <div class="comment-icon">
                    <img src="{{ asset('chat-bubble.png') }}">
                    <span>{{ $commentsCount }}</span>
                </div>
            </div>
        </div>

        <div class="purchase-area">
            <button class="purchase-btn" onclick="location.href='{{ Auth::check() ? route('buy.show', ['item_id' => $item->id]) : route('login') }}'">購入手続きへ</button>
        </div>

        <div class="product-description">
            <h3>商品説明</h3>
            <p>{{ $item->description }}</p>
        </div>
        <div class="product-info">
            <h3>商品の情報</h3>
            <div class="category-info">カテゴリー {{ implode(', ', $item->categories->pluck('name')->toArray()) }}</div>
            <div class="product-condition">商品の状態 {{ $item->condition->name }}</div>
        </div>

        <div class="product-comments">
            <h3>コメント（{{ $commentsCount }}）</h3>
            <div class="comment-list">
                @foreach ($item->comments as $comment)
                <div class="comment">
                    <p>{{ $comment->content }}</p>
                </div>
                @endforeach
            </div>
            @auth
            <div class="comment-form">
                <h3>商品へのコメント</h3>
                <form action="{{ route('comment', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    <textarea name="comment" rows="5"></textarea>
                    <button type="submit">送信</button>
                </form>
            </div>
            @endauth
        </div>

    </div>
</div>
@endsection