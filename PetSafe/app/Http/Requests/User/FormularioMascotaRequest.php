<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class FormularioMascotaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'name' => 'required',
            'specie' => 'required',
            'breed_id' => 'required',
            'gender' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'incidentDate' => 'required',
            'photo' => 'required',
        ];
    }
}
