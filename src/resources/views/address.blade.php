@extends('layouts.app')

@section('main')
<main class="main">
    <form class="address-card" action="" method="">
        @csrf
        <div class="address-card__ttl">住所の変更</div>
        <div class="address-card__item">
            <p>郵便番号</p>
            <input class="address-card__item__input" type="" placeholder="" name="" />
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="address-card__item">
            <p>住所</p>
            <input class="address-card__item__input" type="" placeholder="" name="" />
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="address-card__item">
            <p>建物名</p>
            <input class="address-card__item__input" type="" placeholder="" name="" />
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="address-card__btn">
            <input type="submit" value="更新する" />
        </div>
    </form>
</main>
@endsection