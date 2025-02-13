@extends('layouts.app')

@section('main')
<div class="main">
    <div class="index-box"></div>
    <div class="product-card">
        <img class="product-card__img" src="" alt="" />
        <p class="product-card__ttl">{{ $product->name }}</p>
    </div>
</div>
@endsection