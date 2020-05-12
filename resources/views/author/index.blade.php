@extends('layouts.site')

@section('title', __('app.title.authors'))

@section('content')
    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm" width="10%">#</th>
                <th class="th-sm" width="30%">Author</th>
                <th class="th-sm" width="60%">Books</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->fullName }}</td>
                    <td>
                        @foreach($author->books as $book)
                            <div>{{ $book->name }}</div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-right">
        {{ $authors->links() }}
    </div>
@endsection