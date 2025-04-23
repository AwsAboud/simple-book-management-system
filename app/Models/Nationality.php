<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    protected $fillable = [
        'country_name',
        'nationality',
        'alpha2_code',
        'alpha3_code',
    ];
}
