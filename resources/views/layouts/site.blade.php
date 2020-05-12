@extends('layouts.app')

@section('body')
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">{{ __('app.title.bookshelf') }}</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('authors.index') }}">{{ __('app.title.authors') }}</a>
        </nav>
        @if(auth()->user())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-primary">{{ __('app.actions.logout') }}</button>
            </form>
        @else
            <a class="mr-3 text-decoration-none" href="{{ route('register') }}">{{ __('app.actions.sign_up') }}</a>
            <a class="btn btn-outline-primary" href="{{ route('login') }}">{{ __('app.actions.sign_in') }}</a>
        @endif
    </div>
    <div class="container">
        @yield('content')
    </div>
@endsection