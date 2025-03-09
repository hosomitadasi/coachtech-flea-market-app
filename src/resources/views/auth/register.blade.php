@extends('layouts.app')

@section('main')
<div class="main">
    <h1 class="form-ttl">会員登録</h1>
    <form action="/register" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="name" id="name" name="name">
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email">
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password">
            @error('password')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">確認用パスワード</label>
            <input type="password_confirmation" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="form-btn">登録する</button>
    </form>
    <a class="transition-link" href="/login">ログインはこちら</a>
</div>
@endsection