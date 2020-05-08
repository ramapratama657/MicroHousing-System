<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    protected $fillable = [
        'address', 'numUnits', 'sizePerUnit', 'monthlyRental', 'img',
    ];

    public function unit()
    {
    	# code...
    	return $this->hasMany('App\Unit');
    }

    public function allocation()
    {
    	# code...
    	return $this->hasManyThrough('App\Allocation','App\Unit');	
    }
}