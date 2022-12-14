<?php

namespace App\Http\Requests\Costumer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCostumerRequest extends FormRequest
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
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'document_id' => 'required|cpf|unique:costumers,document_id,'.$this->costumer->id,
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'required' => 'The field :attribute must have be filled',
            'string'   => 'The field :attribute must have be a string',
            'min'      => 'The field :attribute must have at least :min characters',
        ];
    }
}
