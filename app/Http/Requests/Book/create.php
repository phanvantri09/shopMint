<?php

namespace App\Http\Requests\Book;

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
            'numberPhone'=>'required|min:10|max:11',
            'location'=>'required',
            'id_distance'=>'required',
            'type_driver'=>'required',
            'content'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'không để trống',
            'location.required'=>'không để trống',
            'id_distance.required'=>'không để trống',
            'type_driver.required'=>'không để trống',
            'content.required'=>'không để trống',
            'numberPhone.required'=>'không để trống',
            'numberPhone.min'=>'Phải đúng 10 số',
            'numberPhone.max'=>'Phải đúng 10 số',
        ];
    }
}
