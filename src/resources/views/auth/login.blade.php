@extends('layouts.app')

@section('main')
<div class="main">
    <h1 class="form-ttl">ログイン</h1>
    <form action="/login" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" required>
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="form-btn">ログインする</button>
    </form>
    <a class="transition-link" href="/register">会員登録はこちら</a>
</div>
@endsection