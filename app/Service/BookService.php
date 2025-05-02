<?php

namespace App\Service;

use App\Models\Book;
use App\Service\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BookService extends BaseService
{
    /**
     * Create a new class instance.
     */
    public function __construct(Book $model)
    {
        $egarLoadRelations = ['publisher', 'authors', 'genres'];
        parent::__construct($model,  $egarLoadRelations);
    }

    public function create(array $data): Model
    {
        try {
            return DB::transaction(function () use ($data) {
                // Create book
                $book = Book::create($data);
    
                // Sync relationships
                $book->genres()->sync($data['genres']);
                $book->authors()->sync($data['authors']);
    
                return $book->load($this->egarLoadRelations);
            });
        } catch (\Exception $e) {
            Log::error('Operation failed: ' . $e->getMessage());
            throw new HttpException('500', 'Something went wrong');
        }
    }
    public function update(array $data, int $id): Model
    {
        try {
            return DB::transaction(function () use ($data, $id) {
                // Update book
                $book = Book::findOrFail($id);
                $book->update($data);

                // Sync relationshipss 
                if(isset($data['genres'])){
                    $book->genres()->sync($data['genres']);
                }
                    
                if(isset($data['authors'])){
                    $book->authors()->sync($data['authors']);
                }

                return $book->load($this->egarLoadRelations);
            });
        } catch (\Exception $e) {
              Log::error('Operation failed: ' . $e->getMessage());
              throw new HttpException('500', 'Something went wrong');
        }
    }
}
