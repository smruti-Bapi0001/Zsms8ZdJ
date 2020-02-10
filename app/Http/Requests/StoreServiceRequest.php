<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'name' => ['required','max:255'],
            'email' =>  ['required','email'],
            'phone' => ['required', 'numeric'],
        ];
    }

    public function messages(){
        return [
            'name.required' => "Name is required",
            'email.required' => "email is required" ,
            'phone.required' => "phone is required",
        ];
    }
}
