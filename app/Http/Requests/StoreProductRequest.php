<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category_id'=>'required|integer',
            'name'=>'required',
            'unit_price'=>'required|integer',
            'import_price'=>'required|integer',
            'quantity'=>'required|integer',
            'discount'=>'required|integer',
            'description'=>'nullable',
        ];
    }
}
