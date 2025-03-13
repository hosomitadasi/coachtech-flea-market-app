@extends('layouts.app')

@section('main')
<div class="main">
    <div class="mail">登録していただいたメールアドレスに認証メールを送付しました。<br>メール認証を完了してください。</div>
    <form action="/login" method="POST">
        @csrf
        <button type="submit" class="mail-btn">認証はこちらから</button>
    </form>
    <a class="transition-link" href="/register">認証メールを再送する</a>
@endsection