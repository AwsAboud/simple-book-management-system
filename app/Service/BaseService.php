<?php

namespace App\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BaseService
{
    protected $model;
    protected $egarLoadRelations =  [];

    /**
     * Create a new class instance.
     */
    public function __construct(Model $model, array $egarLoadRelations = [])
    {
        $this->model = $model;
        $this->egarLoadRelations = $egarLoadRelations;

    }

    public function getAll(): Collection
    { 
        return $this->model::with($this->egarLoadRelations)->get(); 
    }

    public function getOne(int $id): Model
    {  
        $object = $this->model::findOrFail($id);

        return $object->load($this->egarLoadRelations);
    }

    public function create(array $data): Model
    {
        $object = $this->model::create($data);

        return $object->load($this->egarLoadRelations);
    }

    public function update(array $data, int $id) : Model
    {
        
        $object = $this->model::findOrFail($id);
        $object->update($data);

        return $object->load($this->egarLoadRelations);
    }

    public function delete(int $id): bool
    {
        $object = $this->model::findOrFail($id);

        return $object->delete();
    }
}
