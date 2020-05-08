<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'user_id', 'email', 'monthlyIncome',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
