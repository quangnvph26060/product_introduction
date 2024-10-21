<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntroductionCategoriesRequest extends FormRequest
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
            'name' => 'required|min:5|max:100',
            'description' => 'required|min:10',
            'website_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên dịch vụ không được để trống.',
            'name.min' => 'Tên dịch vụ phải có ít nhất 10 ký tự.',
            'name.max' => 'Tên dịch vụ không được vượt quá 100 ký tự.',
            'description.required' => 'Mô tả không được để trống.',
            'description.min' => 'Mô tả phải có ít nhất 20 ký tự.',
            'website_id.required' => 'Website không được trống'
        ]; 
    }
}
