<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookRepository
{
    /**
     * @param array $with
     * @return LengthAwarePaginator
     */
    public function get(array $with = [])
    {
        return Book::query()
            ->with($with)
            ->paginate();
    }

    /**
     * @param Book $book
     * @param array $relations
     * @return Book
     */
    public function loadRelations(Book $book, array $relations = [])
    {
        return $book->load($relations);
    }

    /**
     * @param Book $book
     * @param array $attributes
     * @return bool
     */
    public function update(Book $book, array $attributes)
    {
        return $book->update($attributes);
    }


    /**
     * @param array $attributes
     * @return mixed
     */
    public function store(array $attributes)
    {
        return Book::create($attributes);
    }

    /**
     * @param Book $book
     * @return bool|null
     */
    public function destroy(Book $book)
    {
        return $book->delete();
    }
}