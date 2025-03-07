@extends('layouts.app')

@section('main')
<div class="main">
    <h1 class="form-ttl">商品の出品</h1>
    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">商品画像</label>
            <input type="file" id="image" name="image">
            @error('image')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label>カテゴリー</label>
            <div class="categories">
                @foreach($categories as $category)
                <button type="button" class="category-button" data-id="{{ $category->id }}">{{ $category->name }}</button>
                @endforeach
            </div>
            <input type="hidden" name="categories" id="selected-categories">
            @error('categories')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="condition_id">商品の状態</label>
            <select id="condition_id" name="condition_id">
                <option value="">選択してください</option>
                @foreach($conditions as $condition)
                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                @endforeach
            </select>
            @error('condition_id')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">商品名</label>
            <input type="text" id="name" name="name">
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="brand_name">ブランド名</label>
            <input type="text" id="brand_name" name="brand_name">
        </div>

        <div class="form-group">
            <label for="description">商品の説明</label>
            <textarea id="description" name="description"></textarea>
            @error('description')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">販売価格</label>
            <input type="text" id="price" name="price" placeholder="¥">
            @error('price')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="form-btn">出品する</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectedCategories = [];

        document.querySelectorAll('.category-button').forEach(button => {
            button.addEventListener('click', function() {
                const categoryId = this.getAttribute('data-id');
                if (selectedCategories.includes(categoryId)) {
                    const index = selectedCategories.indexOf(categoryId);
                    selectedCategories.splice(index, 1);
                    this.classList.remove('selected');
                } else {
                    selectedCategories.push(categoryId);
                    this.classList.add('selected');
                }
                document.getElementById('selected-categories').value = selectedCategories.join(',');
            });
        });
    });
</script>
@endsection