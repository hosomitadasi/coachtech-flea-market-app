@extends('layouts.app')

@section('main')
<div class="main">
    <form class="auth-card" action="/login" method="post">
        @csrf
        <div class="auth-card__ttl">ログイン</div>
        <div class="auth-card__item">
            <p>ユーザー名/メールアドレス</p>
            <input class="auth-card__item__input" type="email" placeholder="Email" name="email" />
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="auth-card__item">
            <p>パスワード</p>
            <input class="auth-card__item__input" type="password" placeholder="Password" name="password" />
            @error('password')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="auth-card__btn">
            <input type="submit" value="ログインする" />
        </div>
    </form>
    <a class="transition-link" href="/auth.register">会員登録はこちら</a>
</div>
@endsection