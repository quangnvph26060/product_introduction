<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAdvantageCreateRequest extends FormRequest
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
            'name' => 'required|min:10|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|min:20',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên lợi ích sản phẩm không được để trống.',
            'name.min' => 'Tên lợi ích sản phẩm phải có ít nhất 10 ký tự.',
            'name.max' => 'Tên lợi ích sản phẩm không được vượt quá 100 ký tự.',
            'description.required' => 'Mô tả không được để trống.',
            'description.min' => 'Mô tả phải có ít nhất 20 ký tự.',
            'image.required' => 'Hình ảnh không được để trống.',
            'image.image' => 'Hình ảnh phải là một file hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'icon.required' => 'Ảnh icon không được để trống.',
            'icon.image' => 'Ảnh icon phải là một file hình ảnh.',
            'icon.mimes' => 'Ảnh icon phải có định dạng: jpeg, png, jpg, gif, svg.',
            'icon.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ];
    }
}