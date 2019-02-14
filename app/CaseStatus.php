<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseStatus extends Model
{
    protected $primaryKey = 'id'; 
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
	    'id',
	    'name',
	    'financial_year',
	    'month',
	    'year',
	    'total',
	    'documents_complete',
	    'objection_raised',
	    'under_processing',
	    'under_checking',
	    'under_approval',
	    'approved'
	];
}
