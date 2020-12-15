<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateWorkshopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       if(Auth::user()->isAdmin()){
           return true;
       }
       return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'text' => 'required',
            'agenda_link' => 'required',
            'workshop_category_id' => 'required',
            'start' => 'required',
            'end' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "De workshop titel is verplicht.",
            'workshop_category_id.required' => "De workshop titel is verplicht.",
            'sub_title.required' => "De workshop ondertitel is verplicht.",
            'text.required' => "De workshop text is verplicht.",
            'agenda_link.required' => "De workshop agenda is verplicht.",
        ];
    }
}
