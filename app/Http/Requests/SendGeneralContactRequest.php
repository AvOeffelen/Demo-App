<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendGeneralContactRequest extends FormRequest
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
            'name' => 'required|min:1|max:36',
            'email' => 'required|email',
            'message' => 'required|min:5|max:500'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Het naam veld is verplicht.',
            'email.required' => 'Het email veld is verplicht.',
            'email.email' => 'Het opgegeven email adress is geen valide email adres',
            'message.required' => 'Het bericht veld is verplicht.'
        ];
    }
}
