@extends('layouts.app')

@section('main')
<div class="main">
    <h1 class="form-ttl">住所の変更</h1>
    <form action="/address" method="POST">
        @csrf
        <div class="form-group">
            <label for="zip_code">郵便番号</label>
            <input type="zip_code" id="zip_code" name="zip_code">
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">住所</label>
            <input type="password" id="address" name="address">
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