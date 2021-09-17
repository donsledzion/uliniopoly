<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PricingRequest extends FormRequest
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
            'buy' => 'nullable|numeric',
            'mortgage' => 'nullable|numeric',
            'stop_single' => 'nullable|numeric',
            'stop_1_cottage' => 'nullable|numeric',
            'stop_2_cottage' => 'nullable|numeric',
            'stop_3_cottage' => 'nullable|numeric',
            'stop_4_cottage' => 'nullable|numeric',
            'stop_hotel' => 'nullable|numeric',
            'stop_1_of_kind' => 'nullable|numeric',
            'stop_2_of_kind' => 'nullable|numeric',
            'stop_3_of_kind' => 'nullable|numeric',
            'stop_4_of_kind' => 'nullable|numeric',
        ];
    }
}
