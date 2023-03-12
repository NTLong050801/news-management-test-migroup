<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => 'required|min:10',
            'content' => 'required|min:20'
        ];
    }
    public function  messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute',
            'min' => ":attribute ít nhất :min ký tự",
        ];
    }
    public function attributes()
    {
        return [
            'title' => "Tiêu đề",
            "content" => "Nội dung",

        ];
    }
}
