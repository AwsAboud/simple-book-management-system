<?php

namespace App\Service;

use App\Models\Genre;

class GenreService extends BaseService
{
    /**
     * Create a new class instance.
     */
    public function __construct(Genre $model)
    {
        parent::__construct($model);
    }
}
