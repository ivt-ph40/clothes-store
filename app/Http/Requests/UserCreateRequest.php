<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:50'],
            'role_id' => ['required'],
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
            'role_id.required'         => 'Ít nhất chọn 1',
        ];
    }
}
