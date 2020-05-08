<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
	//
    protected $fillable = [
	    'application_id', 'unit_id', 'fromDate', 
	    'duration', 'endDate', 
    ];
    
    public function application()
    {
        return $this->belongsTo('App\Application');
    }
    
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
	
}
