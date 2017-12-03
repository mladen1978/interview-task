<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeacherRequest extends FormRequest
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
            //
            'first_name' => 'required|regex:/^[a-z A-Z]+$/u',
            'last_name' => 'required|regex:/^[a-z A-Z]+$/u',
            'birth_date' => 'required',
            //'school_id' => 'required',
        ];
    }
}
