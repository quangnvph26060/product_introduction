<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessUpdateRequest extends FormRequest
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
            'title' => 'required|min:10|max:100',
            'description' => 'required|min:20',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tên doanh nghiệp không được để trống.',
            'title.min' => 'Tên doanh nghiệp phải có ít nhất 10 ký tự.',
            'title.max' => 'Tên doanh nghiệp không được vượt quá 100 ký tự.',
            'description.required' => 'Mô tả không được để trống.',
            'description.min' => 'Mô tả phải có ít nhất 20 ký tự.',
            'image.image' => 'Hình ảnh phải là một file hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'icon.image' => 'Ảnh icon phải là một file hình ảnh.',
            'icon.mimes' => 'Ảnh icon phải có định dạng: jpeg, png, jpg, gif, svg.',
            'icon.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ];
    }
}
