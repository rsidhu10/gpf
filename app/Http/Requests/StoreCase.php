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
            'zone_cbo'          => 'required',
            'circle_cbo'        => 'required',
            'division_cbo'      => 'required',
            'category_cbo'      => 'required',
            'category_cbo'      => 'required',
            'designation_cbo'   => 'required',
            'reason_cbo'        => 'required',
            'relatesto_cbo'     => 'required',
            'sanction_year_cbo' => 'required',
            'diary_no_txt'  => 'required',
            'emp_name_txt'  => 'required',
            'emp_code_txt'  => 'required | numeric',
            'gpf_no_txt'    => 'required',
            'letter_no_txt' => 'required | alpha_dash',
            'letter_dt_txt' => 'required | date',
            'diary_dt_txt'  => 'required | date',
            'retire_dt_txt' => 'required | date',
         
        ];
        
    }

    public function message()
    {
      
    }
}
