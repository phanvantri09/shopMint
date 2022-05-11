<?php

namespace App\Http\Requests\Bill;

use Illuminate\Foundation\Http\FormRequest;

class create extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'address'=>'required',
            'numberPhone'=>'required|min:10|max:11',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'không để trống',
            'address.required'=>'không để trống',
            'numberPhone.required'=>'không để trống',
            'numberPhone.min'=>'Phải đúng 10 số',
            'numberPhone.max'=>'Phải đúng 10 số',
        ];
    }
}
