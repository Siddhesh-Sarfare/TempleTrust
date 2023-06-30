<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $method = $this->method();

        switch ($method) {
            case 'GET':
            case 'DELETE':
            case 'PUT':
                return []; break;

            case 'POST':
                return [
                    'name' => 'required',
                    'email' => 'required|email',
                    'mobile' => 'required|min:10|numeric',
                ]; break;

            case 'PATCH':
                return [
                    'name' => 'required',
                    'email' => 'required|email',
                    'mobile' => 'required|min:10|numeric',
                ]; break;

            default :
                break;
        }
    }

    /**
     * Modify the returned validation error messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A name is required' ,
            'email.required' => 'An email is required' ,
            'email.email' => 'The email entered must be of a proper format ( example@domain.com )',
            'mobile.required' => 'A mobile number is required' ,
            'mobile.min' => 'The mobile number entered must be of at least 10 digits',
            'mobile.number' => 'The mobile number entered must be of a numeric format ( 0-9 )',
        ];
    }
}
