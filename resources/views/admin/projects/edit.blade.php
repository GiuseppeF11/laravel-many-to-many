@extends('layouts.app')

@section('page-title', $project->title . ' Edit')

@section('main-content')
    <h1>
        {{ $project->title }} - Modifica
    </h1>

    <div class="row">
        <div class="col py-4">
            <div class="mb-4">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-info ">
                    Torna alla Home
                </a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $project->title) }}" placeholder="Inserisci il titolo del progetto..."
                        maxlength="100">
                </div>

                <div class="mb-3">
                    <label for="cover_img" class="form-label">Cover</label>
                    <input class="form-control" type="file" id="cover_img" name="cover_img">
                    @if ($project->cover_img != null)
                    <div class="mt-2">
                        <h4>
                            Cover attuale:
                        </h4>
                        <img src="/storage/{{ $project->cover_img }}" style="max-width: 400px;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="delete_cover_img" name="delete_cover_img">
                            <label class="form-check-label" for="delete_cover_img">
                                Rimuovi immagine
                            </label>
                        </div>
                    </div>
                @endif
                </div>
                    

                <div class="mb-3">
                    <label for="type_id" class="form-label">Categoria</label>
                    <select name="type_id" id="type_id" class="form-select">
                        <option {{ old('type_id', $project->type_id) == null ? 'selected' : '' }} value="">
                            Seleziona una tipologia...
                        </option>
                        @foreach ($types as $type)
                            <option {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}
                                value="{{ $type->id }}">
                                {{ $type->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input
                                @if ($errors->any()) {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                                @else
                                    {{ $project->technologies->contains($technology->id) ? 'checked' : '' }} @endif
                                class="form-check-input" type="checkbox" id="technology-{{ $technology->id }}"
                                name="technologies[]" value="{{ $technology->id }}">
                            <label class="form-check-label"
                                for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                        </div>
                    @endforeach
                </div>
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" class="form-control" id="url" name="url"
                value="{{ old('url', $project->url) }}" placeholder="Inserisci il link del progetto..." maxlength="1024">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea rows="3" class="form-control" id="description" name="description"
                placeholder="Inserisci la descrizione..." maxlength="2000">{{ old('description', $project->description) }} </textarea>
        </div>

        <div>
            <button type="submit" class="btn btn-outline-info">
                Aggiorna
            </button>
        </div>

        </form>
    </div>
    </div>
@endsection
