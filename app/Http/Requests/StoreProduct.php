<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'bail|min:1|required|max:20',
            'product_desc' => 'min:1|required|max:30',
            'product_price' => 'min:1|required|max:8',
            'thumbnail' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048|dimensions:max_height=1385, max_width=1421, min_height=693, min_width=711'
        ];
    }
}
