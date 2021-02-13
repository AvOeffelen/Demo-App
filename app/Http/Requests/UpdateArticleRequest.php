<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateArticleRequest extends FormRequest
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
            'title' => 'required|min:3',
            'text' => 'required|min:10',
            'category_id' => 'required',
            'video_link' => 'nullable|min:3',
            'button_text' => 'nullable|min:3',
            'button_link' => 'nullable|min:3',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "De titel is verplicht.",
            'text.required' => "Het textveld is verplicht.",
            'category_id.required' => "De categorie is verplicht.",
        ];
    }
}
