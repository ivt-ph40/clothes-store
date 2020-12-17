<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'name'              => ['required', 'string', 'max:200'],
            'price'             => ['required', 'integer'],
            'size_id'           => ['required'],
            'description'       => ['required'],
            'detail'            => ['required'],
        ];

    }
    public function messages(){
        return [
            'name.required'         => 'Tên sản phẩm không được để trống',
            'name.max'              => 'Tên sản phẩm chứa tối đa 200 ký tự',
            'price.required'        => 'Giá tiền không dược để trống',
            'price.integer'         => 'Giá tiền phải là 1 số nguyên',
            'size_id.required'      => 'Hãy chọn ít nhất 1 size',
            'images.required'       => 'Ảnh không được để trống',
            'description.required'  => 'Mô tả không được để trống',
            'detail.required'       => 'Thông tin chi tiết không được để trống',
        ];
    }
}
