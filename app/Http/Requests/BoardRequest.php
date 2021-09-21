<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoardRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'nullable|string',
            'slot_1' => 'nullable|numeric',
            'slot_2' => 'nullable|numeric',
            'slot_3' => 'nullable|numeric',
            'slot_4' => 'nullable|numeric',
            'slot_5' => 'nullable|numeric',
            'slot_6' => 'nullable|numeric',
            'slot_7' => 'nullable|numeric',
            'slot_8' => 'nullable|numeric',
            'slot_9' => 'nullable|numeric',
            'slot_10' => 'nullable|numeric',
            'slot_11' => 'nullable|numeric',
            'slot_12' => 'nullable|numeric',
            'slot_13' => 'nullable|numeric',
            'slot_14' => 'nullable|numeric',
            'slot_15' => 'nullable|numeric',
            'slot_16' => 'nullable|numeric',
            'slot_17' => 'nullable|numeric',
            'slot_18' => 'nullable|numeric',
            'slot_19' => 'nullable|numeric',
            'slot_20' => 'nullable|numeric',
            'slot_21' => 'nullable|numeric',
            'slot_22' => 'nullable|numeric',
            'slot_23' => 'nullable|numeric',
            'slot_24' => 'nullable|numeric',
            'slot_25' => 'nullable|numeric',
            'slot_26' => 'nullable|numeric',
            'slot_27' => 'nullable|numeric',
            'slot_28' => 'nullable|numeric',
            'slot_29' => 'nullable|numeric',
            'slot_30' => 'nullable|numeric',
            'slot_31' => 'nullable|numeric',
            'slot_32' => 'nullable|numeric',
            'slot_33' => 'nullable|numeric',
            'slot_34' => 'nullable|numeric',
            'slot_35' => 'nullable|numeric',
            'slot_36' => 'nullable|numeric',
            'slot_37' => 'nullable|numeric',
            'slot_38' => 'nullable|numeric',
            'slot_39' => 'nullable|numeric',
            'slot_40' => 'nullable|numeric',
        ];
    }
}
