<?php

namespace App\Http\Requests;

//use Illuminate\Validation\Validator;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Exceptions\HttpResponseException;

class QuotesStateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        
        return [
            'state' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                   
                    if ( $value<1 || $value >4) {
                        $fail($attribute.' no valido (1-4 validos)');
                    }
                },
            ]
        ];
    }
    

   
    protected function failedValidation(Validator $validator)
    {
        
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json(['data' => $errors], 422)
        );
    }
    
}
