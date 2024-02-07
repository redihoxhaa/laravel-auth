@extends('layouts.admin')

@section('content')
    <div class="project-update container">
        <div class="row justify-content-center">
            <div class="col-12 mt-4">

                @foreach ($errors->all() as $error)
                    {{ $error }}<br />
                @endforeach

                <h2>Update {{ $project->title }}</h2>

                {{-- Link per tonare a tutti i progetti --}}
                <a href="{{ route('admin.projects.index') }}" class="btn btn-danger mb-5 mt-4 text-uppercase">Take a look at
                    all the
                    projects</a>

                {{-- Form di upload nuovo progetto --}}
                <form class="d-flex flex-column align-items-center gap-3 w-100"
                    action="{{ route('admin.projects.update', $project) }}" method="POST">

                    {{-- Token autenticazione  --}}
                    @csrf

                    {{-- Metodo di edit --}}
                    @method('PUT')

                    {{-- Input titolo --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">title</span>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title', $project->title) }}" required>
                        @error('title')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input URL thumb --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">thumb URL</span>
                        <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb"
                            value="{{ old('thumb', $project->thumb) }}" required>
                        @error('thumb')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input descrizione --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">description</span>
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input data di inizio progetto --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">start date</span>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date"
                            name="start_date" value="{{ old('start_date', $project->start_date) }}">
                        @error('start_date')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input data di fine progetto --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">end date</span>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"
                            name="end_date" value="{{ old('end_date', $project->end_date) }}">
                        @error('end_date')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input categoria --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">category</span>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" name="category"
                            value="{{ old('category', $project->category) }}">
                        @error('category')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input linguaggio --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">language</span>
                        <input type="text" class="form-control @error('language') is-invalid @enderror" name="language"
                            value="{{ old('language', $project->language) }}" required>
                        @error('language')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input status --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">status</span>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" name="status"
                            value="{{ old('status', $project->status) }}">
                        @error('status')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input slug --}}
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text text-capitalize">slug</span>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                            value="{{ old('slug', $project->slug) }}">
                        @error('slug')
                            <div class="alert alert-danger m-0">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Bottone submit --}}
                    <button type="submit" class="btn btn-success w-25 my-3">Update project</button>
                </form>
            </div>
        </div>
    </div>
@endsection
