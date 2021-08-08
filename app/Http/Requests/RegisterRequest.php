<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:6',
            'password_confirm' => 'required|min:6|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ten khong duoc de trong',
            'name.unique' => 'Ten da co nguoi dung',
            'email.required' => 'Email khong duoc de trong',
            'email.unique' => 'Email da ton tai',
            'email.email' => 'Email sai dinh dang',
            'password.required' => 'Password khong duoc de trong',
            'password.min' => 'Password it nhat 6 ky tu',
            'password_confirm.required' => 'Password_confirm it nhat 6 ky tu',
            'password_confirm.min' => 'Password_confirm it nhat 6 ky tu',
            'password_confirm.same' => 'Mat khau xac nhan khong chinh xac'
        ];
    }
}
