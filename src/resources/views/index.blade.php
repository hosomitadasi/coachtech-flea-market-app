@extends('layouts.app')

@section('main')
<div class="toppage-list">
    <button class="tab" id="recommend-tab" onclick="toggleTab('recommend')">おすすめ</button>
    <button class="tab" id="mylist-tab" onclick="toggleTab('mylist')">マイリスト</button>
</div>
<hr class="divider">
<div class="products-list" id="products-list">
    @foreach ($items as $item)
    <div class="products-card">
        <a href="{{ route('item.detail', ['id' => $item->id]) }}">
            <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="product-image">
        </a>
        <div class="product-name">{{ $item->name }}</div>
    </div>
    @endforeach
</div>

<script>
    function toggleTab(tab) {
        const recommendTab = document.getElementById('recommend-tab');
        const mylistTab = document.getElementById('mylist-tab');
        if (tab === 'recommend') {
            recommendTab.style.color = '#ff0000';
            mylistTab.style.color = '#5f5f5f';
            // TODO: Fetch and display recommended items
        } else {
            recommendTab.style.color = '#5f5f5f';
            mylistTab.style.color = '#ff0000';
            // TODO: Fetch and display items in my list
        }
    }
</script>

@endsection