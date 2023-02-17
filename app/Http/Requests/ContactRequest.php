<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'firstname' => 'required|max:20',
            'lastname' => 'required|max:20',
            'gender' => 'required',
            'email' => 'required|email',
            'postcode' => 'required|max:8|regex:/^[0-9]{3}-[0-9]{4}$/',
            'address' => 'required|max:50',
            'opinion' => 'required|max:120'
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => '名前は必須項目です。',
            'firstname.max' => '名前は30字以内で入力してください。',
            'lastname.required' => '名前は必須項目です。',
            'lastname.max' => '名前は30字以内で入力してください。',
            'gender' => '性別は必須項目です',
            'email.required' => 'メールは必須項目です。',
            'email.email' => 'メールは正しい形式で入力してください。',
            'postcode.required' => '郵便番号は必須項目です。',
            'postcode.max' => '郵便番号は8文字以内で入力してください。',
            'postcode.regex' => '郵便番号は正しい形式で入力してください。',
            'address.required' => '住所は必須項目です。',
            'address.max' => '住所は50文字以内で入力してください。。',
            'opinion.required' => 'お問い合わせ内容は必須項目です。',
            'opinion.max' => 'お問い合わせ内容は120文字以内で入力してください。。'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'postcode' => mb_convert_kana($this->postcode, 'as')
        ]);
    }

}
