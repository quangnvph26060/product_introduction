<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessesUpdateRequest extends FormRequest
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
            'email' => ['required', 'email', 'regex:/^[\w\.\-]+@[a-zA-Z\d\-]+\.[a-zA-Z]{2,}$/'],
            'phone_number' => ['required', 'regex:/^(\+84|0)[3|5|7|8|9][0-9]{8}$/'],
            'description' => 'required|min:20',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên doanh nghiệp không được để trống.',
            'name.min' => 'Tên doanh nghiệp phải có ít nhất 10 ký tự.',
            'name.max' => 'Tên doanh nghiệp không được vượt quá 100 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email phải là địa chỉ email hợp lệ.',
            'email.regex' => 'Email không đúng định dạng.',
            'phone_number.required' => 'Số điện thoại không được để trống.',
            'phone_number.regex' => 'Số điện thoại không hợp lệ.',
            'description.required' => 'Mô tả không được để trống.',
            'description.min' => 'Mô tả phải có ít nhất 20 ký tự.',
            'image.image' => 'Hình ảnh phải là một file hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
        ];
    }
}
