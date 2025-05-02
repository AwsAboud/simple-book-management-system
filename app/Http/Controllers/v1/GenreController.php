<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\BaseCRUDController;
use Illuminate\Http\Request;
use App\Service\GenreService;
use App\Http\Controllers\Controller;
use App\Http\Resources\GenreResource;
use App\Http\Requests\Genre\CreateGenreRequest;
use App\Http\Requests\Genre\UpdateGenreRequest;

class GenreController extends BaseCRUDController
{
    public function __construct(GenreService $service)
    {
        parent::__construct(
            $service,
            CreateGenreRequest::class,
            UpdateGenreRequest::class,
            GenreResource::class
        );
    }
}
