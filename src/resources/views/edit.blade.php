@extends('layouts.app')

@section('main')
<div class="profile-content">
    <h1 class="form-ttl">プロフィール設定</h1>
    <form action="{{ route('edit.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="avatar">ユーザー画像</label>
            <input type="file" id="avatar" name="avatar">
            @error('avatar')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="zip_code">郵便番号</label>
            <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', auth()->user()->zip_code) }}">
            @error('zip_code')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">住所</label>
            <input type="text" id="address" name="address" value="{{ old('address', auth()->user()->address) }}">
            @error('address')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="building">建物名</label>
            <input type="text" id="building" name="building" value="{{ old('building', auth()->user()->building) }}">
            @error('building')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="form-btn">更新する</button>
    </form>
</div>
@endsection