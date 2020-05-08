@extends('layouts.admin')

@section('title', 'Admin - Books')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="mt-1 mb-1">
        <a href="{{ route('admin.books.create') }}" class="btn btn-outline-success" title="Create">
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm" width="10%">#</th>
                <th class="th-sm" width="30%">Name</th>
                <th class="th-sm" width="30%">Author</th>
                <th class="th-sm" width="20%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author ? $book->author->fullName : '' }}</td>
                    <td>
                        <div class="row no-gutters">
                            <div>
                                <a href="{{ route('admin.books.view', $book->id) }}" class="btn btn-outline-info mr-1" title="View">
                                    <i class="fa fa-info"></i>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-outline-warning mr-1" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                            </div>
                            <div>
                                <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-right">
        {{ $books->links() }}
    </div>
@endsection