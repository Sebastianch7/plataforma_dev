<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudeRequest extends FormRequest
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
            'name' => ['required'],
            'lastname' => ['required'],
            'typeDocument' => ['required'],
            'idNumber' => ['required','numeric'],
            'mail' => ['required','email'],
            'phone' => ['required','min:7'],
            'cellphone' => ['required'],
            'address' => ['required'],
            'postulate' => ['required'],
            'departament' => ['required','numeric'],
            'city' => ['required','numeric'],
            'idState' => ['numeric'],
            'service' => ['required'],
        ];
    }
}
