@extends('layouts.app')

@section('main')
<main class="main">
    <form class="profile-card" action="" method="">
        @csrf
        <div class="profile-card__ttl">プロフィール設定</div>
        <div class="profile-card__avatar">
            <input type="submit" value="画像を選択する" />
        </div>
        <div class="profile-card__item">
            <p>ユーザー名</p>
            <input class="profile-card__item__input" type="" placeholder="" name="" />
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="profile-card__item">
            <p>郵便番号</p>
            <input class="profile-card__item__input" type="" placeholder="" name="" />
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="profile-card__item">
            <p>住所</p>
            <input class="profile-card__item__input" type="" placeholder="" name="" />
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="profile-card__item">
            <p>建物名</p>
            <input class="profile-card__item__input" type="" placeholder="" name="" />
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-btn">
            <input type="submit" value="更新する" />
        </div>
    </form>
</main>
@endsection