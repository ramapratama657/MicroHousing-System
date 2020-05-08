<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
	//
	protected $fillable = [
		'residence_id', 'unitNo', 'availability',
	];

	public function residence(){
		return $this->belongsTo('App\Residence');
	}

	public function allocation()
	{
		# code...
		return $this->hasMany('App\Allocation');
	}
}
