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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'name' => 'required|min:5',
            // 'detail' => 'required|min:10',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
    public function messages()
    {
        return [
            // 'name.required' => 'name không được rỗng',
            // 'name.min' => 'name phải lơn hơn 5 ký tự',
            // 'detail.required' => 'detail không được rỗng',
            // 'detail.min' => 'detail phải lơn hơn 10 ký tự',
        ];
    }
}
