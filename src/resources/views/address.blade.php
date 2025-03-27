@extends('layouts.app')

@section('main')
<div class="address-container">
    <h1 class="form-ttl">住所の変更</h1>
    <form action="{{ route('address.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="zip_code">郵便番号</label>
            <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', Auth::user()->zip_code) }}" required>
            @error('zip_code')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">住所</label>
            <input type="text" id="address" name="address" value="{{ old('address', Auth::user()->address) }}" required>
            @error('address')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="building">建物名</label>
            <input type="text" id="building" name="building" value="{{ old('building', Auth::user()->building) }}" required>
            @error('building')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="form-btn">更新する</button>
    </form>
</div>
@endsection