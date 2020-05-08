<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class AuthorRepository
{
    /**
     * @param array $with
     * @param array $withCount
     * @param bool $needPaginate
     * @return LengthAwarePaginator|Collection|static[]
     */
    public function get(array $with = [], array $withCount = [], bool $needPaginate = true)
    {
        $query = Author::query()
            ->with($with)
            ->withCount($withCount);

        return $needPaginate ? $query->paginate() : $query->get();
    }

    /**
     * @param Author $author
     * @param array $relations
     * @return Author
     */
    public function loadRelations(Author $author, array $relations = [])
    {
        return $author->load($relations);
    }

    /**
     * @param Author $author
     * @param array $attributes
     * @return bool
     */
    public function update(Author $author, array $attributes)
    {
        return $author->update($attributes);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function store(array $attributes)
    {
        return Author::create($attributes);
    }

    /**
     * @param Author $author
     * @return bool|null
     */
    public function destroy(Author $author)
    {
        return $author->delete();
    }
}