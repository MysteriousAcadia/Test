<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ExprenseFromRequest extends Request
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
            'details' => 'required',
            'expense_amount' => 'required|integer'
        ];
    }
}
