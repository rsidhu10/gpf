<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $primaryKey = 'id'; 
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
	    'id',
	    'category_id',
	    'category',
	    'designation',
	];

	public function GpfCategory()
    {
        return $this->belongsTo('App\GpfCategory');
    }
}
