@extends('layouts.admin')

@section('content')
    <div class="welcome container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <h1 class="p-3">
                    Welcome to my portfolio, {{ Auth::user()->name }}!
                </h1>

                <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mt-3">Take a look at my projects</a>

            </div>
        </div>
    </div>
@endsection
