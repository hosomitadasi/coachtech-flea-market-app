@extends('layouts.app')

@section('main')
<div class="sell-container">
    <h1 class="form-ttl">商品の出品</h1>
    <form action="{{ route('sell') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="item_image">商品画像</label>
            <div class="image-upload">
                <input type="file" id="item_image" name="item_image" required>
                <button type="button">画像を選択する</button>
            </div>
            @error('item_image')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="item_name">商品名</label>
            <input type="text" id="item_name" name="item_name" required>
            @error('item_name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="brand_name">ブランド名</label>
            <input type="text" id="brand_name" name="brand_name">
        </div>

        <div class="form-group">
            <label for="description">商品の説明</label>
            <textarea id="description" name="description" rows="5" required></textarea>
            @error('description')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">カテゴリー</label>
            <div class="category-buttons">
                @foreach ($categories as $category)
                <button type="button" class="category-btn" data-category-id="{{ $category->id }}">{{ $category->name }}</button>
                @endforeach
            </div>
            <input type="hidden" id="category" name="category" required>
            @error('category')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="condition">商品の状態</label>
            <select id="condition" name="condition" required>
                @foreach ($conditions as $condition)
                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                @endforeach
            </select>
            @error('condition')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">販売価格</label>
            <div class="price-input">
                <span>￥</span>
                <input type="number" id="price" name="price" required>
            </div>
            @error('price')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="form-btn">出品する</button>
    </form>
</div>

<script>
    document.querySelectorAll('.category-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var categoryId = this.getAttribute('data-category-id');
            var categoryInput = document.getElementById('category');
            categoryInput.value = categoryId;
            this.classList.toggle('active');
        });
    });
</script>
@endsection