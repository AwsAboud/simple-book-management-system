<?php

namespace App\Http\Controllers\v1;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Note: for real-world application we would use pagination with caching
        $books = Book::all();
        
        return $this->successResponse(BookResource::collection($books));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBookRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                // Create book
                $data = $request->validated();
                $book = Book::create($data);
    
                // Sync relationships
                $book->genres()->sync($data['genres']);
                $book->authors()->sync($data['authors']);
    
                return $this->successResponse(new BookResource($book));
            });
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        try {
            return DB::transaction(function () use ($book, $request) {
                // Update book
                $data = $request->validated();
                $book->update($data);

                // Sync relationshipss 
                $book->genres()->sync($data['genres']);
                $book->authors()->sync($data['authors']);

                return $this->successResponse(new BookResource($book));
            });
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return $this->successResponse(null, 'Book deleted successfully.', 204);

    }
}
