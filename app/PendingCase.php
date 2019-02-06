<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingCase extends Model
{

	public function getrelates_toAttribute($value)
	{
       if($value == "0"){
        return "Rajesh";
        }else{
            return "Approved";
        }   
	}

	public function getstatusAttribute($value)
	{
       	if($value == "0"){
        return "Pending";
        }else{
            return "Approved";
        }   
	
	}



    protected $fillable = [
	    'id',
	    'zone_id',
	    'circle_id',
	    'division_id',
	    'letter_no',
	    'letter_dt',
	    'diary_no',
	    'diary_dt',
	    'category_id',
	    'gpf_number',
	    'empcode',
	    'name',
	    'designation_id',
	    'casetype_id',
	    'retirement_dt',
	    'relates_to',
	    'status',
	    'approved_by',
	    'approval_no',
	    'approval_dt',
	    'approval_amt',
	    'certificate',
	    'certificate_no',
	    'certificate_dt',
	    'financial_year',
	    'flag',
	    'created_at',
	];





}
