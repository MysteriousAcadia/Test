<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegularEggsSaleRequest extends Request
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
            'buyer_in_regular' => 'required',
            'vehicle_no_in_regular' => 'required',
            'buyer_in_regular' => 'required',
            'regular_in_regular' => 'required|integer',
            'damaged_in_regular' => 'required|integer',
            'destroyed_in_regular' => 'required|integer',
        ];
    }
}
