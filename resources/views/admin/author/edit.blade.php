@extends('layouts.admin')

@section('title', 'Admin - Authors')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <form class="mt-2" method="POST" action="{{ $action }}">
                    @csrf
                    @if(isset($author))
                        @method('PUT')
                    @endif
                    <div class="form-group row">
                        <label for="lastName" class="col-sm-2 col-form-label">Last name</label>
                        <div class="col-sm-10">
                            <input
                                class="form-control @error('last_name') is-invalid @enderror"
                                id="lastName"
                                name="last_name"
                                autocomplete="off"
                                value="{{ isset($author) ? $author->last_name : '' }}"
                            >
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="firstName" class="col-sm-2 col-form-label">First name</label>
                        <div class="col-sm-10">
                            <input
                                class="form-control @error('first_name') is-invalid @enderror"
                                id="firstName"
                                name="first_name"
                                autocomplete="off"
                                value="{{ isset($author) ? $author->first_name : '' }}"
                            >
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="middleName" class="col-sm-2 col-form-label">Middle name</label>
                        <div class="col-sm-10">
                            <input
                                class="form-control @error('middle_name') is-invalid @enderror"
                                id="middleName"
                                name="middle_name"
                                autocomplete="off"
                                value="{{ isset($author) ? $author->middle_name : '' }}"
                            >
                            @error('middle_name')
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