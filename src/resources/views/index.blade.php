@extends('layouts.app')

@section('main')
<div class="main">
    <div class="tab-menu">
        <a href="" class="">おすすめ</a>
        @auth
        <a href="" class="">マイリスト</a>
        @else
        <a href="auth.login">マイリスト</a>
        @endauth
    </div>

    <div class="product-list">
        @foreach ($items as $item)
        <div class="product-item">
            <a href="">
                <img src="" alt="">
                <p>上に商品写真、ここに名前が入る</p>
                @if ($item->is_sold)
                <span class="sold-out">SOLD OUT</span>
                @endif
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection