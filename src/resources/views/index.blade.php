@extends('layouts.app')

@section('main')
<div class="main">
    <div class="tab-container">
        <button class="tab-button active" id="recommend-tab" onclick="showTab('recommend')">おすすめ</button>
        <button class="tab-button" id="wishlist-tab" onclick="showTab('wishlist')">マイリスト</button>
    </div>

    <section class="product-list" id="recommend-list">
        @foreach ($items as $item)
        @if (!$item->is_own)
        <article class="product-item" onclick="location.href='{{ route('item.detail', ['id' => $item->id]) }}'">
            <img src="{{ $item->image_url }}" alt="商品画像">
            <h2>{{ $item->name }}</h2>
            @if ($item->sold)
            <span class="sold">Sold</span>
            @endif
        </article>
        @endif
        @endforeach
    </section>
    @auth
    <section class="product-list" id="wishlist-list" style="display: none;">
        @foreach ($wishlistItems ?? [] as $item)
        <article class="product-item" onclick="location.href='{{ route('item.detail', ['id' => $item->id]) }}'">
            <img src="{{ $item->image_url }}" alt="商品画像">
            <h2>{{ $item->name }}</h2>
            @if ($item->sold)
            <span class="sold">Sold</span>
            @endif
        </article>
        @endforeach
    </section>
    @endauth

</div>
@endsection

@section('scripts')
<script>
    function showTab(tab) {
        document.getElementById('recommend-tab').classList.remove('active');
        document.getElementById('wishlist-tab').classList.remove('active');
        document.getElementById('recommend-list').style.display = 'none';
        document.getElementById('wishlist-list').style.display = 'none';

        if (tab === 'recommend') {
            document.getElementById('recommend-tab').classList.add('active');
            document.getElementById('recommend-list').style.display = 'block';
        } else {
            document.getElementById('wishlist-tab').classList.add('active');
            document.getElementById('wishlist-list').style.display = 'block';
        }
    }
</script>
@endsection