<?php

namespace App\Service;

use App\Models\Country;

class CountryService extends BaseService
{
    /**
     * Create a new class instance.
     */
    public function __construct(Country $model)
    {
        $this->model = $model;
    }
}
