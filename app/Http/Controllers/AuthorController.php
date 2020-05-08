<?php

namespace App\Http\Controllers;

use App\Repositories\AuthorRepository;
use Illuminate\Contracts\View\Factory;
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
        $authors = $this->repository->get(['books']);

        return view('author.index', compact('authors'));
    }
}
