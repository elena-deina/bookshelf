@extends('layouts.admin')

@section('title', __('app.title.admin') . ' - ' . __('app.title.books') )

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            {{ $book->name }}

            <div class="float-right">
                <div class="row">
                    <div>
                        <a
                            href="{{ route('admin.books.edit', $book->id) }}"
                            class="btn btn-outline-warning mr-1"
                            title="{{ __('app.actions.edit_book') }}"
                        >
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                    </div>
                    <div>
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" title="{{ __('app.actions.delete_book') }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                Author -
                @if($book->author ? $book->author->fullName : '')
                    <a href="{{ route('admin.authors.view', $book->author->id) }}">
                        {{ $book->author ? $book->author->fullName : '' }}
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection