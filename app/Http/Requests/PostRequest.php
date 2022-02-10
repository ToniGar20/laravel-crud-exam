<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|between:5,30',
            'heading' => 'required|between:5,50',
            'body' => 'required|between:5,1000',
            'commentable' => 'required',
            'expires' => 'required',
            'access' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El título es requerido',
            'title.between' => 'El título ha de tener entre 5 y 30 caracteres',

            'heading.required' => 'El extracto es requerido',
            'heading.between' => 'El extracto ha de tener entre 5 y 50 caracteres',

            'body.required' => 'El contenido del post es requerido',
            'body.size' => 'El contenido del pos ha de tener al menos 5 caracteres',

            'commentable.required' => 'Indica si el post es comentable',

            'expires.required' => 'Indica si el post expira',

            'access.required' => 'Indica si el post es público o privado'

        ];
    }
}
