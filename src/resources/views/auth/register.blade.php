@extends('layouts.app')

@section('main')
<main class="main">
    <form class="auth-card" action="/register" method="post">
        @csrf
        <div class="auth-card__ttl">会員登録</div>
        <div class="auth-card__item">
            <p>ユーザー名</p>
            <input class="auth-card__item__input" type="text" placeholder="Username" name="name" />
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="auth-card__item">
            <p>メールアドレス</p>
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
        <div class="auth-card__item">
            <p>確認用パスワード</p>
            <input class="auth-card__item__input" type="password" placeholder="password_confirmation" name="password_confirmation" />
            @error('passpassword-confirmationword')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="auth-card__btn">
            <input type="submit" value="登録する" />
        </div>
    </form>
    <a class="transition-link" href="/auth.login">ログインはこちら</a>
</main>
@endsection