@extends('layouts.admin')

@section('content')
    <div class="project-show container">
        <div class="row justify-content-center">
            <div class="col-12 mt-4">
                {{-- Collegamento a tutti i fumetti --}}
                <a href="{{ route('admin.projects.index') }}" class="btn btn-danger mb-5 text-uppercase">Take a look at all
                    the
                    projects</a>

                <div class="row d-flex">
                    <div class="col-6">

                        {{-- Immagine progetto --}}

                        <div class="pic-container">
                            <img src="{{ $project->thumb }}" alt="{{ $project->title }} thumb">
                        </div>

                    </div>

                    <div class="col-6 d-flex flex-column">

                        <div class="card-body d-flex flex-column">

                            {{-- Titolo progetto --}}
                            <a href="{{ route('admin.projects.show', $project) }}">
                                <h3 class="title pt-3">{{ $project->title }}</h3>
                            </a>

                            {{-- Stato progetto --}}
                            <p
                                class="language fw-bold @if ($project->status === 'completed') text-success @else text-secondary @endif w-25 ">
                                {{ $project->status }}</p>

                            {{-- Descrizione progetto --}}
                            <p class="description">{{ $project->description }}</p>

                            <div class="card p-3 mt-2 mb-4">
                                {{-- Data inizio progetto --}}
                                <span class="start-date py-3">Project started on
                                    {{ \Carbon\Carbon::parse($project->start_date)->format('M d Y') }}</span>

                                @isset($project->end_date)
                                    {{-- Data fine progetto --}}
                                    <span class="end-date py-3">Project ended on
                                        {{ \Carbon\Carbon::parse($project->end_date)->format('M d Y') }}</span>
                                @endisset
                            </div>

                            {{-- Categoria progetto --}}
                            <p class="category text-uppercase badge bg-info w-auto mx-auto my-3 p-2">
                                Category: {{ $project->category }}
                            </p>


                            {{-- Linguaggio progetto --}}
                            <p class="language badge bg-primary w-auto mx-auto p-2">Developed using
                                {{ $project->language }}</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endsection
