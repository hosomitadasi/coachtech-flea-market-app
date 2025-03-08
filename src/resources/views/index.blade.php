@extends('layouts.app')

@section('main')
<div class="main">
    <div class="tab-container">
        <button class="tab-button active" id="recommend-tab">おすすめ</button>
        <button class="tab-button" id="wishlist-tab">マイリスト</button>
    </div>
    <section class="product-list">
        @foreach ($items as $item)
        <article class="product-item">
            <img src="{{ $item->image_url }}" alt="商品画像">
            <h2>{{ $item->name }}</h2>
            @if ($item->sold)
            <span class="sold">Sold</span>
            @endif
        </article>
        @endforeach
    </section>
</div>
@endsection