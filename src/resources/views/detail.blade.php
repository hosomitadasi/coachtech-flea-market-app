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
            <p class="price">￥{{ number_format($item->price) }}（税込）</p>
        </div>

        <div class="product-actions">
            <div class="action-icons">
                <div class="like-icon">
                    @php
                    $isLiked = Auth::check() ? App\Http\Controllers\LikeController::isLiked($item->id) : false;
                    @endphp
                    <form action="{{ $isLiked ? route('unlike', ['id' => $item->id]) : route('like', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        @if($isLiked)
                        @method('DELETE')
                        @endif
                        <button type="submit">
                            <img src="{{ $isLiked ? '/img/like.png' : '/img/unlike.png' }}" class="like-btn">
                        </button>
                        <span>{{ $likesCount }}</span>
                    </form>
                </div>
                <div class="comment-icon">
                    <img src="/img/chat-bubble.png">
                    <span>{{ $commentsCount }}</span>
                </div>
            </div>
            <button class="purchase-btn" onclick="location.href='{{ Auth::check() ? route('purchase', ['item_id' => $item->id]) : route('login') }}'">購入手続きへ</button>
        </div>

        <div class="product-description">
            <h3>商品説明</h3>
            <p>{{ $item->description }}</p>
        </div>

        <div class="product-info">
            <h3>商品の情報</h3>
            <span class="category-badge">{{ implode(', ', $item->categories->pluck('name')->toArray()) }}</span>
            <span class="condition-badge">{{ $item->condition->name }}</span>
        </div>

        <div class="product-comments">
            <h3>コメント（{{ $commentsCount }}）</h3>
            <div class="comment-list">
                @foreach ($item->comments as $comment)
                <div class="comment">
                    <img src="{{ asset('storage/' . $comment->user->avatar) }}" alt="ユーザー画像" class="comment-user-image">
                    <p>{{ $comment->content }}</p>
                </div>
                @endforeach
            </div>
            <div class="comment-form">
                <h3>商品へのコメント</h3>
                <form action="{{ route('comment', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    <textarea name="comment" rows="4"></textarea>
                    <button type="submit" class="comment-btn" onclick="return {{ Auth::check() ? 'true' : "location.href='" . route('login') . "'" }}">コメントを送信する</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection