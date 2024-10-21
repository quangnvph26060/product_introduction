<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteFeatureCreateRequest extends FormRequest
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
            'name' => 'required|min:10|max:100',
            'description' => 'required|min:20',
            'icon_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên tính năng không được để trống.',
            'name.min' => 'Tên tính năng phải có ít nhất 10 ký tự.',
            'name.max' => 'Tên tính năng không được vượt quá 100 ký tự.',
            'description.required' => 'Mô tả không được để trống.',
            'description.min' => 'Mô tả phải có ít nhất 20 ký tự.',
            'icon_image.required' => 'Hình ảnh không được để trống.',
            'icon_image.image' => 'Hình ảnh phải là một file hình ảnh.',
            'icon_image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
            'icon_image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ];
    }
}
