<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Exceptions\HttpResponseException;

class UserUpdateRequest extends FormRequest
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
            'address' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255', 
            'country' => 'nullable|string|max:255',   
            'id_type' => 'nullable|integer', 
            'birth' => 'nullable|date',
            'id_activitie' => 'nullable|integer',
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
