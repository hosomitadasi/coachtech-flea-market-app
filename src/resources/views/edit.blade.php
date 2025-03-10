@extends('layouts.app')

@section('main')
<div class="main">
    <h1 class="form-ttl">プロフィール編集画面</h1>
    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <img src="{{ asset('storage/' . $user->avatar) }}" alt="ユーザーアイコン" class="user-avatar">
            <input type="file" name="profile_image" class="select-btn">
            @error('profile_image')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}">
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="zip_code">郵便番号</label>
            <input type="text" id="zip_code" name="zip_code" value="{{ $user->zip_code }}">
            @error('zip_code')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">住所</label>
            <input type="text" id="address" name="address" value="{{ $user->address }}">
            @error('address')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="building">建物名</label>
            <input type="text" id="building" name="building" value="{{ $user->building }}">
            @error('building')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="form-btn">更新する</button>
    </form>
</div>
@endsection