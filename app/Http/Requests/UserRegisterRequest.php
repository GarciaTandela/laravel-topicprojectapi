<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Se a validação se cumprir, ele retorna verdadeiro
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Valida os dados a serem enviados via POST
        return [
            
            'email'=> 'email|required|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:6'

        ];
    }
}
