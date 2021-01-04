<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkshopSignUpRequest extends FormRequest
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
            'name' => 'required|min:3|max:64',
            'email' => 'required|min:3|email|max:64',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Uw naam is verplicht.',
            'name.min' => 'Uw naam moet meer dan 3 karakters bevatten.',
            'email.required' => 'Uw e-mail is verplicht.',
            'email.min' => 'Uw e-mail dient meer dan 3 karakters te bevatten.',
            'email.email' => 'Uw e-mail dient een valide e-mail adres te zijn.',
            'employee_id.max' => 'Uw werknemers nummer mag maximaal 64 karakters bevatten.',
        ];
    }
}
