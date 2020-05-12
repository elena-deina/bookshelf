<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\CreateUpdateRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class BookController extends Controller
{
    private $repository;

    /**
     * BookController constructor.
     * @param BookRepository $bookRepository
     */
    public function __construct(BookRepository $bookRepository)
    {
        $this->repository = $bookRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $books = $this->repository->get(['author']);

        return BookResource::collection($books);
    }

    /**
     * @param Book $book
     * @return BookResource
     */
    public function view(Book $book)
    {
        $this->repository->loadRelations($book, ['author']);

        return BookResource::make($book);
    }

    /**
     * @param Book $book
     * @param CreateUpdateRequest $request
     * @return BookResource
     */
    public function update(Book $book, CreateUpdateRequest $request)
    {
        $this->repository->update($book, $request->validated());

        return BookResource::make($book);
    }

    /**
     * @param CreateUpdateRequest $request
     * @return BookResource
     */
    public function store(CreateUpdateRequest $request)
    {
        $book = $this->repository->store($request->validated());

        return BookResource::make($book);
    }

    /**
     * @param Book $book
     * @return ResponseFactory|Response
     */
    public function destroy(Book $book)
    {
        $status = $this->repository->destroy($book);

        return response(compact('status'));
    }
}
