<?php

namespace App\Service;

use App\Models\Publisher;

class PublisherService extends BaseService
{
    /**
     * Create a new class instance.
     */
    public function __construct(Publisher $model)
    {
        $this->model = $model;
        $this->egarLoadRelations = ['country'];
    }
}
