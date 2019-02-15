<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCase extends FormRequest
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
        $rules = [];
        
        //     if ($this->status_cbo->has('1')) {
        //         $rules['certificate_cbo'] = 'required';
        //         if($this->certificate_cbo->has('Yes')){
        //             $rules['approvedby_cbo']            = 'required';
        //             $rules['approval_order_txt']        = 'required';
        //             $rules['approval_letter_no_txt']    = 'required';
        //             $rules['approval_letter_dt_txt']    = 'required|date';
        //             $rules['approved_amt_txt']          = 'required|numeric';
        //             $rules['certificate_letter_no_txt'] = 'required';
        //             $rules['certificate_letter_dt_txt'] = 'required|date';
        //         }else{
        //             $rules['approvedby_cbo']            = 'required';
        //             $rules['approval_order_txt']        = 'required';
        //             $rules['approval_letter_no_txt']    = 'required';
        //             $rules['approval_letter_dt_txt']    = 'required|date';
        //             $rules['approved_amt_txt']          = 'required|numeric';
        //         }

        //     }else
        //     {
        //         $rules['status_cbo']        = 'required';
        //     }

        // return $rules;
    }
}
