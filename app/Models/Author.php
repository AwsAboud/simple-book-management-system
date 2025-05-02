<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Author extends Model
{
    protected $fillable = [
        'country_id',
        'name', 
    ];

    // Get the country associated with the Author
   public function country(): BelongsTo
   {
       return $this->belongsTo(Country::class);
   }
}
