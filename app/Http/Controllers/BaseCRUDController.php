<?php

namespace App\Http\Controllers;

use App\Service\BaseService;
use Illuminate\Http\Request;

class BaseCRUDController extends Controller
{
    protected $service;
    protected $createRequest;
    protected $updateRequest;
    protected $resource;

    public function __construct(
        BaseService $service,
        string $createRequest,
        string $updateRequest,
        string $resource,
        )
    {
        $this->service = $service;
        $this->resource = $resource;
        $this->createRequest = $createRequest;
        $this->updateRequest = $updateRequest;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = $this->service->getAll();

        return $this->successResponse($this->resource::collection($res));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $data =  app($this->createRequest)->validated();
        $res = $this->service->create($data);

        return $this->successResponse(new $this->resource($res), code:201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $res = $this->service->getOne($id);
        
        return $this->successResponse(new $this->resource($res));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = app($this->updateRequest)->validated();
        $res = $this->service->update($data, $id);

        return $this->successResponse(new $this->resource($res));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $this->service->delete($id);

       return $this->successResponse(null, code:204);
    }
}
