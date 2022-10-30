<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuiterFormRequest extends FormRequest
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
            //
            'guiter-name' => 'required',
            'brand' => 'required',
            'year' => ['required', 'integer'],
        
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'guiter-name' => strip_tags($this['guiter-name']),
            'brand' => strip_tags($this -> brand),
            'year' => strip_tags($this -> year)
        ]);
    }
}