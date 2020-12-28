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
            'workshop_category_id' => 'required',
            'image' => 'sometimes|required|mimes:jpg,png,jpeg,gif'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "De workshop titel is verplicht.",
            'workshop_category_id.required' => "De workshop titel is verplicht.",
            'sub_title.required' => "De workshop ondertitel is verplicht.",
            'text.required' => "De workshop text is verplicht.",
        ];
    }
}
