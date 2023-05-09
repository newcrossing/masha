<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderMailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        {


            $rules = [
                'name' => 'required|string',
                'tel' => 'required|min:7|max:14',
                'check' => 'required|boolean',


            ];

            switch ($this->getMethod()) {
                case 'POST':
                    return $rules;
                case 'PUT':
                    return [
                            'game_id' => 'required|integer|exists:games,id', //должен существовать. Можно вот так: unique:games,id,' . $this->route('game'),
                            'title' => [
                                'required',
                                Rule::unique('games')->ignore($this->title, 'title') //должен быть уникальным, за исключением себя же
                            ]
                        ] + $rules; // и берем все остальные правила
                // case 'PATCH':
                case 'DELETE':
                    return [
                        'game_id' => 'required|integer|exists:games,id'
                    ];
            }
        }
    }


    public function messages()
    {
        return [
            'date.required' => 'A date is required',
            'date.date_format' => 'A date must be in format: Y-m-d',
            'date.unique' => 'This date is already taken',
            'date.after_or_equal' => 'A date must be after or equal today',
            'date.exists' => 'This date doesn\'t exists',
        ];
    }
}
