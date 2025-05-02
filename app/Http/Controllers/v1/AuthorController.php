<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\AuthorService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Http\Controllers\BaseCRUDController;
use App\Http\Requests\Author\CreateAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;

class AuthorController extends BaseCRUDController
{
    public function __construct(AuthorService $service)
    {
        parent::__construct(
            $service,
            CreateAuthorRequest::class,
            UpdateAuthorRequest::class,
            AuthorResource::class
        );
    }
}
