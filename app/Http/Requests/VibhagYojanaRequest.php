<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VibhagYojanaRequest extends FormRequest
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
                return [];
                break;

            case 'POST':
                return [
                    'category' => 'required',
                    'name' => 'required',
                    'file' => 'mimes:pdf|min:1|max:10240',
                    // 'contentFile' => 'mimes:pdf|min:1|max:10240',
                    // 'contentTitle' => 'required',
                    // 'contentDescription' => 'required',

                    // 'contentTitle.*' => 'required',
                    // 'contentDescription.*' => 'required',
                ];
                break;

            case 'PATCH':
                return [
                    'category' => 'required',
                    'name' => 'required',
                    'file' => 'mimes:pdf|min:1|max:10240',
                    // 'contentFile' => 'mimes:pdf|min:1|max:10240',
                    // 'contentTitle.*' => 'required',
                    // 'contentDescription.*' => 'required',
                ];
                break;

            default:
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
            'name.required' => 'A Vibhag or Yojana name is required',
        ];
    }
}
