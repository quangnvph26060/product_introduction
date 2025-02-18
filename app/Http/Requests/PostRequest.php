<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
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
            'image' => ($id ? 'nullable' : 'required') . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|min:10|max:200',
            'description' => 'required|min:20',
            'slug' => ($id ? 'required' : 'nullable'),
            'tags' => 'required',
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
            'title' => 'Tiêu đề',
            'description' => 'Mô tả chi tiết',
            'image' => 'Ảnh ',
            'slug' => 'Slug',
            'tags' => 'Tags'

        ];
    }
}
