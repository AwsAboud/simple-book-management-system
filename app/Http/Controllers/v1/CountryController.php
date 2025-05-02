<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\CountryService;
use App\Http\Resources\CountryResource;
use App\Http\Controllers\BaseCRUDController;
use App\Http\Requests\Country\CreateCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;

class CountryController extends BaseCRUDController
{
    public function __construct(CountryService $service)
    {
        parent::__construct(
            $service,
            CreateCountryRequest::class,
            UpdateCountryRequest::class,
            CountryResource::class
        );

    }
}
