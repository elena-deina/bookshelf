<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\CreateUpdateRequest;
use App\Models\Book;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class BookController extends Controller
{
    private $repository;
    private $authorRepository;

    /**
     * BookController constructor.
     *
     * @param BookRepository $bookRepository
     * @param AuthorRepository $authorRepository
     */
    public function __construct(BookRepository $bookRepository, AuthorRepository $authorRepository)
    {
        $this->repository = $bookRepository;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $books = $this->repository->get(['author']);

        return view('admin.book.index', compact('books'));
    }

    /**
     * @param Book $book
     * @return Factory|View
     */
    public function view(Book $book)
    {
        $this->repository->loadRelations($book, ['author']);

        return view('admin.book.view', compact('book'));
    }

    /**
     * @param Book $book
     * @return Factory|View
     */
    public function edit(Book $book)
    {
        $action = route('admin.books.update', $book->id);
        $authors = $this->authorRepository->get([], [], false);

        return view('admin.book.edit', compact('book', 'action', 'authors'));
    }


    /**
     * @param Book $book
     * @param CreateUpdateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update(Book $book, CreateUpdateRequest $request)
    {
        $this->repository->update($book, $request->validated());

        return redirect(route('admin.books.view', $book->id))->with('message', __('app.messages.record_updated'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $action = route('admin.books.store');
        $authors = $this->authorRepository->get([], [], false);

        return view('admin.book.edit', compact('book', 'action', 'authors'));
    }

    /**
     * @param CreateUpdateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateUpdateRequest $request)
    {
        $book = $this->repository->store($request->validated());

        return redirect(route('admin.books.view', $book->id))->with('message', __('app.messages.record_created'));
    }

    /**
     * @param Book $book
     * @return RedirectResponse|Redirector
     */
    public function destroy(Book $book)
    {
        $this->repository->destroy($book);

        return redirect(route('admin.books.index'))->with('message', __('app.messages.record_deleted'));
    }
}
