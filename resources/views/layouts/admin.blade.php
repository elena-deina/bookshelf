@extends('layouts.app')

@section('body')
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Admin panel</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('admin.authors.index') }}">Authors</a>
        </nav>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('admin.books.index') }}">Books</a>
        </nav>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-primary">Logout</button>
        </form>
    </div>
    <div class="container">
        @yield('content')
    </div>
@endsection
