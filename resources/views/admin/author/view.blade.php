@extends('layouts.admin')

@section('title', __('app.title.admin') . ' - ' . __('app.title.authors') )

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            {{ $author->fullName }}

            <div class="float-right">
                <div class="row">
                    <div>
                        <a
                            href="{{ route('admin.authors.edit', $author->id) }}"
                            class="btn btn-outline-warning mr-1"
                            title="{{ __('app.actions.edit_author') }}"
                        >
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                    </div>
                    <div>
                        <form action="{{ route('admin.authors.destroy', $author->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger"  title="{{ __('app.actions.delete_author') }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="mt-1 mb-1">
                    <a
                        href="{{ route('admin.books.create') }}"
                        class="btn btn-outline-success"
                        title="{{ __('app.actions.create_book') }}"
                    >
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <table class="table table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm" width="80%">{{ __('app.pages.title.book') }}</th>
                            <th class="th-sm" width="20%">{{ __('app.pages.title.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($author->books as $book)
                        <tr>
                            <td>{{ $book->name }}</td>
                            <td>
                                <a
                                    href="{{ route('admin.books.edit', $book->id) }}"
                                    class="btn btn-outline-warning"
                                    title="{{ __('app.actions.edit_book') }}"
                                >
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a
                                    href="{{ route('admin.books.destroy', $book->id) }}"
                                    class="btn btn-outline-danger"
                                    title="{{ __('app.actions.delete_book') }}"
                                >
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection