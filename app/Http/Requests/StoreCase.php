<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCase extends FormRequest
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
                    'zone'      => 'required',   
                    'circle'    => 'required_if:zone,12','approved',
                    'division'  => 'required_if:zone,11',
                    'dor'       => 'sometimes|required|date',
                ];
    }

    public function message()
    {
      
    }
}
