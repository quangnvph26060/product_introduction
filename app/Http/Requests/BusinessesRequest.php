<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessesRequest extends FormRequest
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
        $id = request()->route('id'); // Lấy id từ route
        return [
            'name' => 'required|min:10|max:100',
            'email' => ['required', 'email', 'regex:/^[\w\.\-]+@[a-zA-Z\d\-]+\.[a-zA-Z]{2,}$/'],
            'phone_number' => ['required', 'regex:/^(\+84|0)[3|5|7|8|9][0-9]{8}$/'],
            'description' => 'required|min:20',
            'image' => ($id ? 'nullable' : 'required') . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return __('request.messages');
    }

    public function attributes()
    {
        return [
            'name' => 'Tên daoanh nghiệp',
            'description' => 'Mô tả',
            'image' => 'Ảnh ',
            'email' => 'Email',
            'phone_number' => 'Số điện thoại',

        ];
    }
}
