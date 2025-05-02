<?php

namespace App\Service;

use App\Models\Author;

class AuthorService extends BaseService
{
    /**
     * Create a new class instance.
     */
    public function __construct(Author $model)
    {
        $this->model = $model;
        $this->egarLoadRelations = ['country'];
    }
}
