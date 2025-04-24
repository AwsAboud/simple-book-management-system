<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $fillable = [
        'publisher_id',
        'title',
        'description', 
    ];

    // Get the publisher that owns the book.
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    // Get the authors that belong to the book.
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

     // Get the genres that belong to the book.
     public function genres(): BelongsToMany
     {
         return $this->belongsToMany(Genre::class);
     }
}
