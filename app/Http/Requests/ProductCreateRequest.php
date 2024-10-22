<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:10|max:200',
            'long_description' => 'required|min:10',
            'short_description' => 'required|min:20',
            'category_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'name.min' => 'Tên sản phẩm phải có ít nhất :min ký tự.',
            'name.max' => 'Tên sản phẩm không được vượt quá :max ký tự.',
            'short_description.required' => 'Mô tả không được để trống.',
            'short_description.min' => 'Mô tả phải có ít nhất :min ký tự.',
            'long_description.required' => 'Mô tả không được để trống.',
            'long_description.min' => 'Mô tả phải có ít nhất :min ký tự.',
            'main_image.required' => 'Hình ảnh không được để trống.',
            'main_image.image' => 'Hình ảnh phải là một file hình ảnh.',
            'main_image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
            'main_image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'category_id.required' => 'Danh mục sản phẩm không được trống.'
        ];
    }
}
