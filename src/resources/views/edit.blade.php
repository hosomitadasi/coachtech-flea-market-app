@extends('layouts.app')

@section('main')
<div class="main">
    <h1 class="form-ttl">プロフィール編集画面</h1>
    <form action="/edit" method="POST">
        @csrf
        <div class="form-group">
            <img src="{{ $user->avatar }}" alt="ユーザーアイコン" class="user-avatar">
            <button type="submit" class="select-btn">画像を選択する</button>
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="name" id="name" name="name">
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="zip_code">郵便番号</label>
            <input type="zip_code" id="zip_code" name="zip_code">
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">住所</label>
            <input type="address" id="address" name="address">
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="building">建物名</label>
            <input type="building" id="building" name="building">
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="form-btn">更新する</button>
    </form>
</div>
@endsection