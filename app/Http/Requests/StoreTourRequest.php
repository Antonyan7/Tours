<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTourRequest extends FormRequest
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
//            'name' => 'required',
////            'img' => 'required',
//            'description' => 'required',
//            'age' => 'required|integer',
//            'availability' => 'required',
//            'price' => 'required',
//            'departure' => 'required',
//            'departure_time' => 'required',
//            'return_time' => 'required',
//            'included' => 'required',
//            'not_included' => 'required',
        ];
    }
}
