<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Publisher extends Model
{
    protected $fillable = [
        'country_id',
        'name',
        'email',
    ];

   // Get the country associated with the publisher
   public function country(): BelongsTo
   {
       return $this->belongsTo(Country::class);
   }
}
