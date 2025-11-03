<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DictionaryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'keyword' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'keyword.required' => 'キーワードを入力してください',
            'keyword.string' => 'キーワードは文字列で入力してください',
            'keyword.max' => 'キーワードは255文字以内で入力してください',
            'description.required' => '説明を入力してください',
            'description.string' => '説明は文字列で入力してください',
        ];
    }
}
