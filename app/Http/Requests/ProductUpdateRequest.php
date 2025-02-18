<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $id = request()->route('id'); // Lấy id từ route

        return [
            'main_image' => ($id ? 'nullable' : 'required') . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:10|max:200',
            'short_description' => 'required|min:20',
            'long_description' => 'required|min:10',
            'tags' => 'required',
            'slug' => ($id ? 'required' : 'nullable'),
            'category_id' => 'required'
        ];
    }


    public function messages()
    {
        return __('request.messages');
    }

    /**
     * Tùy chỉnh tên trường dữ liệu (thuộc tính).
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Tên danh mục',
            'short_description' => 'Mô tả chi tiết',
            'long_description' => 'Mô tả chi tiết',
            'main_image' => 'Ảnh đại diện',
            'category_id' => 'Danh mục',
            'tags' => 'Tags',
            'slug' => 'Slug',
        ];
    }
}
