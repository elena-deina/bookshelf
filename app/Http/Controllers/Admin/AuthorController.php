<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\CreateUpdateRequest;
use App\Models\Author;
use App\Repositories\AuthorRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class AuthorController extends Controller
{
    private $repository;

    /**
     * AuthorController constructor.
     * @param AuthorRepository $authorRepository
     */
    public function __construct(AuthorRepository $authorRepository)
    {
        $this->repository = $authorRepository;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $authors = $this->repository->get([], ['books']);

        return view('admin.author.index', compact('authors'));
    }

    /**
     * @param Author $author
     * @return Factory|View
     */
    public function view(Author $author)
    {
        $this->repository->loadRelations($author, ['books']);

        return view('admin.author.view', compact('author'));
    }

    /**
     * @param Author $author
     * @return Factory|View
     */
    public function edit(Author $author)
    {
        $action = route('admin.authors.update', $author->id);

        return view('admin.author.edit', compact('author', 'action'));
    }

    /**
     * @param Author $author
     * @param CreateUpdateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update(Author $author, CreateUpdateRequest $request)
    {
        $this->repository->update($author, $request->validated());

        return redirect(route('admin.authors.view', $author->id))->with('message', __('app.messages.record_updated'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $action = route('admin.authors.store');

        return view('admin.author.edit', compact('action'));
    }

    /**
     * @param CreateUpdateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateUpdateRequest $request)
    {
        $author = $this->repository->store($request->validated());

        return redirect(route('admin.authors.view', $author->id))->with('message', __('app.messages.record_created'));
    }

    /**
     * @param Author $author
     * @return RedirectResponse|Redirector
     */
    public function destroy(Author $author)
    {
        $this->repository->destroy($author);

        return redirect(route('admin.authors.index'))->with('message', __('app.messages.record_deleted'));
    }
}
