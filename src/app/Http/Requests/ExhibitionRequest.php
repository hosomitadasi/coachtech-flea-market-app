<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'item_name' => 'required',
            'description' => 'required|max:255',
            'item_image' => 'required|image|mimes:jpeg,png',
            'category' => 'required',
            'condition' => 'required',
            'price' => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'item_name.required' => '商品名を入力してください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '商品説明は255字以内で入力してください',
            'item_image.required' => '商品画像をアップロードしてください',
            'item_image.image' => '商品画像は画像ファイルである必要があります',
            'item_image.mimes' => '商品画像はJPEGまたはPNG形式でアップロードしてください',
            'category.required' => '商品のカテゴリーを選択してください',
            'condition.required' => '商品の状態を選択してください',
            'price.required' => '商品価格を入力してください',
            'price.integer' => '商品価格は数値で入力してください',
            'price.min' => '商品価格は0円以上である必要があります',
        ];
    }
}
