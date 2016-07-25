<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DamagedEggsSsaleRequest extends Request
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
            'store_id' => 'required|integer',
            'user_id' => 'required|integer',
            'vehicle_no_in_damaged' => 'required',
            'buyer_in_damaged' => 'required',
            'damaged_in_damaged' => 'required|integer',
            'rate_in_dmaged' => 'required|integer',
            'amount' => 'required|integer',
        ];
    }
}
