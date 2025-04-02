@extends('layouts.app')

@section('main')
<main class="main">
    <div class="profile-header">
        <div class="profile-info">
            <img src="{{ asset('storage/' . $user->avatar) }}" alt="プロフィール画像" class="profile-image">
            <h2>{{ $user->name }}</h2>
            <a href="{{ route('profile.edit') }}" class="edit-profile-btn">プロフィールを編集</a>
        </div>
    </div>
    <hr>
    <div class="products">
        <button class="tab" onclick="showProducts('sold')">出品した商品</button>
        <button class="tab" onclick="showProducts('purchased')">購入した商品</button>
    </div>
    <div id="sold" class="product-list active">
        @foreach($soldItems as $item)
        <div class="product-item">
            <img src="{{ asset('storage/' . $item->image_url) }}" alt="商品画像" class="product-image">
            <p>{{ $item->name }}</p>
        </div>
        @endforeach
    </div>
    <div id="purchased" class="product-list">
        @foreach($purchasedItems as $item)
        <div class="product-item">
            <img src="{{ asset('storage/' . $item->image_url) }}" alt="商品画像" class="product-image">
            <p>{{ $item->name }}</p>
        </div>
        @endforeach
    </div>
</main>
@endsection

@section('scripts')
<script>
    function showProducts(type) {
        document.getElementById('sold').classList.remove('active');
        document.getElementById('purchased').classList.remove('active');
        document.querySelector(`button[onclick="showProducts('${type}')"]`).classList.add('active');
        document.getElementById(type).classList.add('active');
    }
</script>
@endsection