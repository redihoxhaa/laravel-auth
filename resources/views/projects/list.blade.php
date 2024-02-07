@extends('layouts.admin')

@section('content')
    <div class="project-list container">
        <div class="row justify-content-center">
            <div class="col-12 mt-4">
                <div class="all-projects d-flex flex-column align-items-center">

                    {{-- Collegamento a tutti i fumetti --}}
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-success text-uppercase mb-5 mt-4">Create a
                        new
                        project</a>

                    <ul class="row g-5">
                        @foreach ($projects as $project)
                            <li class="col-12 col-md-6 d-flex">
                                <div class="card w-100 p-3">

                                    {{-- Immagine progetto --}}
                                    <a href="{{ route('admin.projects.show', $project) }}">
                                        <div class="pic-container mt-4">
                                            <img src="{{ $project->thumb }}" alt="{{ $project->title }} thumb">
                                        </div>
                                    </a>

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

                                        {{-- Pulsanti --}}
                                        <div class="tools row my-5">

                                            {{-- Pulsante di modifica --}}
                                            <div class="col-6 text-center">
                                                <a href="{{ route('admin.projects.edit', $project) }}"
                                                    class="btn btn-warning text-uppercase w-75">Edit</a>
                                            </div>

                                            {{-- Area di conferma eliminazione --}}
                                            <div class="col-6 text-center">

                                                {{-- Pulsante apertura modale --}}
                                                <button class="delete btn btn-danger text-uppercase w-75"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#my-dialog-{{ $project->id }}">Delete</button>

                                                {{-- Modale --}}
                                                <div class="modal" id="my-dialog-{{ $project->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            {{-- Messaggio di alert --}}
                                                            <div class="modal-header text-center">
                                                                <h3>Are you sure?</h3>
                                                            </div>

                                                            {{-- Informazione operazione --}}
                                                            <div class="modal-body text-center">
                                                                You are about to delete {{ $project->title }}</span>
                                                            </div>

                                                            <div class="modal-footer">

                                                                {{-- Pulsante annulla --}}
                                                                <button class="btn btn-success text-uppercase"
                                                                    data-bs-dismiss="modal">Keep
                                                                </button>

                                                                {{-- Pulsante elimina --}}
                                                                <form
                                                                    action="{{ route('admin.projects.destroy', $project) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input class="btn btn-danger text-uppercase"
                                                                        type="submit" value="DELETE">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>



                </div>
            </div>
        </div>
    </div>
@endsection
