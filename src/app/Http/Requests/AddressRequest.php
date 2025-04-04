<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'zip_code' => ['required', 'regex:/^\d{3}-\d{4}$/' ],
            'address' => 'required',
            'building' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'zip_code.required' => '郵便番号を入力してください',
            'zip_code.regex' => '郵便番号は「123-4567」の形式で入力してください',
            'address.required' => '住所を入力してください',
            'building.required' => '建物名を入力してください',
        ];
    }
}
