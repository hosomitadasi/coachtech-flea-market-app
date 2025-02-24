@extends('layouts.app')

@section('main')
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