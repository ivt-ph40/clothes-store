<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:50', 'confirmed'],
        ];

    }
    public function messages(){
        return [
            'name.required'         => 'Tên không được để trống',
            'name.max'              => 'Tên chứa tối đa 100 ký tự',
            'email.unique'              => 'Email đã tồn tại',
            'email.required'              => 'Email không được để trống',
            'password.required'              => 'Mật khẩu không được để trống',
            'password.min'              => 'Mật khẩu phải ít nhất 8 ký tự',
            'password.max'              => 'Mật khẩu nhiều nhất 50 ký tự',
            'password.confirmed'              => 'Nhập lại mật khẩu không khớp',
        ];
    }
}
