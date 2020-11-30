<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:30'],
        ];

    }
    public function messages(){
        return [
            'name.required'         => 'Danh mục không được để trống',
            'name.max'              => 'Danh mục chứa tối đa 30 ký tự',
        ];
    }
}
