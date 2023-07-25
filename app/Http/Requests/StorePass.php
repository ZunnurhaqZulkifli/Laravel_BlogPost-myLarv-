<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePass extends FormRequest
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
            'web_name' => 'min:1|required|max:50',
            'web_id' => 'min:1|required|max:50',
            'web_password' => 'min:1|required|max:50',
            'web_link' => 'min:0|max:100',
            'comments' => 'min:0|max:100',
        ];
    }
}
