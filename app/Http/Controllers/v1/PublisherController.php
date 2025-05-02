<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\PublisherService;
use App\Http\Controllers\Controller;
use App\Http\Resources\PublisherResource;
use App\Http\Controllers\BaseCRUDController;
use App\Http\Requests\Publisher\CreatePublisherRequest;
use App\Http\Requests\Publisher\UpdatePublisherRequest;

class PublisherController extends BaseCRUDController
{
    public function __construct(PublisherService $service)
    {
        parent::__construct(
            $service,
            CreatePublisherRequest::class,
            UpdatePublisherRequest::class,
            PublisherResource::class
        );
    }
}
