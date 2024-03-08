@extends('layouts.app')

@section('page-title', $project->title.' Edit')

@section('main-content')
    <h1>
        {{ $project->title }} Edit
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

            <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}"
                        placeholder="Inserisci il titolo del progetto..." maxlength="100">
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">Tipo</label>
                    <select name="type_id" id="type_id" class="form-select">
                        <option
                            value=""
                            {{ old('type_id') == null ? 'selected' : '' }}>
                            Seleziona un tipo...
                        </option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">URL</label>
                    <input type="text" class="form-control" id="url" name="url" value="{{ old('url', $project->url) }}"
                        placeholder="Inserisci il link del progetto..." maxlength="1024">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea rows="3" class="form-control" id="description" name="description" placeholder="Inserisci la descrizione..." maxlength="2000">{{ old('description', $project->description) }} </textarea>
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