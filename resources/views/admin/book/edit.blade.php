@extends('layouts.admin')

@section('title', 'Admin - Authors')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <form class="mt-2" method="POST" action="{{ $action }}">
                    @csrf
                    @if(isset($book))
                        @method('PUT')
                    @endif

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                autocomplete="off"
                                value="{{ isset($book) ? $book->name : '' }}"
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="authorId" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <select class="form-control @error('author_id') is-invalid @enderror" name="author_id" id="authorId">
                                @foreach($authors as $author)
                                    <option
                                        value="{{ $author->id }}"
                                        @if(isset($book) && $book->author_id && $book->author_id == $author->id) selected @endif
                                    >
                                        {{ $author->fullName }}
                                    </option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary mb-2">Save</button>
                        <a href="{{ url()->previous() }}" class="btn btn-warning mb-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection