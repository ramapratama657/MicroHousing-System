<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    protected $fillable = [
        'address', 'numUnits', 'sizePerUnit', 'monthlyRental',
    ];
}
