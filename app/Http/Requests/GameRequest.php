<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'name' => 'nullable|string',
            'board_id' => 'required|numeric|min:1',
            'start_balance' => 'required|numeric|between:100,65000',
            'start_bonus' => 'required|numeric|between:100,6500',
            'players' => 'required|array',
            'players.*' => 'nullable|numeric|distinct|min:1',

        ];
    }
}
