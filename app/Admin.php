<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends model
{
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
