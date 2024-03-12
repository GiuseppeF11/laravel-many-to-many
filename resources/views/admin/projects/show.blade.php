@extends('layouts.app')

@section('page-title', $project->title)

@section('main-content')
<h1>
    {{ $project->title }}
</h1>

<div class="row">
    <div class="col">
        <div class="mb-4">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                Torna alla Home
            </a>
        </div>

        <div class="card">
            @if ($project->cover_img != null)
                <img src="{{ asset('storage/'.$project->cover_img) }}" alt="{{ $project->title }}"> {{-- Usiamo asset per percorso url completo --}}
            @endif

            <div class="card-body">
                <ul>
                    <li>
                        <strong>Data di creazione: </strong> {{ $project->created_at->format('d/m/Y - H:i') }}
                    </li>

                    <li>
                        <strong>Url: </strong>
                        {{ $project->url }}
                    </li>

                    <li>
                        <strong>Linguaggi: </strong>
                        {{ $project->type->title }}
                    </li>
                    <li>
                        <strong>Tecnologie: </strong>
                        @forelse ($project->technologies as $technology)
                            <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="badge rounded-pill text-bg-info">
                                {{ $technology->title }}
                            </a>
                        @empty
                            -
                        @endforelse
                    </li>
                </ul>
                <p>
                    <strong>Descrizione: </strong>
                    {{ $project->description }}
                </p>
        </div>
    </div>
</div>
@endsection

<style lang="scss" scoped>
    .card {
        max-width: 600px;
        margin: 0 auto;
    }
</style>
