@extends('layouts.admin')

@section('title', 'Admin - Authors')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="mt-1 mb-1">
        <a href="{{ route('admin.authors.create') }}" class="btn btn-outline-success" title="Create">
            <i class="fa fa-plus"></i>
        </a>
    </div>
    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm" width="10%">#</th>
                <th class="th-sm" width="60%">Author</th>
                <th class="th-sm" width="10%">Books count</th>
                <th class="th-sm" width="20%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->fullName }}</td>
                    <td>{{ $author->books_count }}</td>
                    <td>
                        <div class="row no-gutters">
                            <div>
                                <a href="{{ route('admin.authors.view', $author->id) }}" class="btn btn-outline-info mr-1" title="View">
                                    <i class="fa fa-info"></i>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('admin.authors.edit', $author->id) }}" class="btn btn-outline-warning mr-1" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                            </div>
                            <div>
                                <form action="{{ route('admin.authors.destroy', $author->id) }}" method="POST">
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
        {{ $authors->links() }}
    </div>
@endsection
