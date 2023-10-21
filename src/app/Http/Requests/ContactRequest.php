<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PostCodeRule;

class ContactRequest extends FormRequest
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
            'family_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'postcode' => ['required', new PostCodeRule()],
            'address' => ['required', 'string'],
            'opinion' => ['required', 'string', 'max:120']
        ];
    }

    public function messages()
    {
        return [
            'family_name.required' => '苗字を入力してください',
            'family_name.string' => '苗字を文字列で入力してください',
            'last_name.required' => '名前を入力してください',
            'last_name.string' => '名前を文字列で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'address.required' => '住所を入力してください',
            'building_name.string' => '建物名を文字列で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.string' => 'ご意見を文字列で入力してください',
            'opinion.max' => 'ご意見は120字以内で入力してください'
        ];
    }
}
