<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $fillable = [
	    'applicant_id', 'residence_id', 'applicationDate', 
	    'requiredMonth', 'requiredYear', 'status',
    ];

    public function applicant()
    {
        return $this->belongsTo('App\Applicant');
    }

    public function residence()
    {
        return $this->belongsTo('App\Residence');
    }
}
