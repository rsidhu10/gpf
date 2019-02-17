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
        return 
        [
            'status_cbo'                => 'required',
            'approvedby_cbo'            => 'required_if:status_cbo,1',
            'approval_order_txt'        => 'required_if:status_cbo,1',
            'approval_letter_no_txt'    => 'required_if:status_cbo,1',
            'approval_letter_dt_txt'    => 'required_if:status_cbo,1|date',
            'approved_amt_txt'          => 'required_if:status_cbo,1',
            'certificate_cbo'           => 'required_if:status_cbo,1', 
            'certificate_letter_no_txt' => 'required_if:certificate_cbo,"Yes"',
            'certificate_letter_dt_txt' => 'required_if:certificate_cbo,"Yes"|date',
        ];

    }
}
