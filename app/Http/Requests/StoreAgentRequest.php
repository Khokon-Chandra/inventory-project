<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgentRequest extends FormRequest
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
            '_key'=>'required',
            'type'=>'required|min:5|max:6',
            'name'=>'required',
            'fathers_name'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'rate_of_interest'=>'required|integer',
        ];
    }
}
