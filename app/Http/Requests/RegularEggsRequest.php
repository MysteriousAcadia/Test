<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegularEggsRequest extends Request
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
            'vehicle_no' => 'required',
            'regular' => 'required|Integer',
            'damaged' => 'required|Integer',
            'transport_damage' => 'required|Integer',
            'user_id' => 'required|Integer',
            'store_id' => 'required|Integer',
        ];
    }
}
