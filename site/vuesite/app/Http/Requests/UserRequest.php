<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'account' => ['required', 'between:5,20' ,'regex:/^[0-9a-zA-Z]+$/']
           ,'password' => ['required', 'between:5,20', 'regex:/^[0-9a-zA-Z!@]+$/']

        ];

        if($this->routeIs('post.login')) {
            $rules['account'][] ='exists:users, account';
        }

        return $rules;
    }

    protected function failedValidation(Validator $validator) {
        $response =response()->json([
            'success' => false,
            'message' => '유효성체크오류',
            'data' => $validator->errors()
        ], 422);

        throw new HttpResponseException($response);

    }   
}
