@extends('layouts.app')

@section('main')
<div class="main">
    <h1 class="form-ttl">画像の出品</h1>
    <form action="/sell" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">商品画像</label>
            <input type="name" id="name" name="name">
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">カテゴリー</label>

            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">商品の状態</label>
            <input type="address" id="address" name="address">
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="building">商品名</label>
            <input type="building" id="building" name="building">
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">ブランド名</label>
            <input type="name" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="name">商品の説明</label>
            <input type="name" id="name" name="name">
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">販売価格</label>
            <input type="name" id="name" name="name">
            @error('')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="form-btn">出品する</button>
    </form>
</div>

<div class="main">
    <h1>商品の出品</h1>
    <form>
        <label>商品画像</label>
        <input type="file">
        <label>カテゴリー</label>
        <div class="category-tags">
            <button>ファッション</button>
            <button>家電</button>
            <button>インテリア</button>
            <button>レディース</button>
            <button>メンズ</button>
        </div>
        <label>商品の状態</label>
        <select>
            <option>選択してください</option>
            <option>新品</option>
            <option>良好</option>
            <option>傷あり</option>
        </select>
        <label>商品名</label>
        <input type="text">
        <label>商品説明</label>
        <textarea></textarea>
        <label>販売価格</label>
        <input type="number">
        <button>出品する</button>
    </form>
</div>
@endsection