<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'name'=>'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'không được để trống',
            'phone_number.required'=>'không được để trống',
            'phone_number.regex'=> 'không đúng định dạng',
            'phone_number.min'=>'ít nhất có 10 số',
            'address.required'=>'không được để trống',
        ];
    }
}
