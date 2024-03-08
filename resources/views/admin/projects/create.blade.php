@extends('layouts.app')

@section('page-title', 'Create Project')

@section('main-content')
    <h1>
        Create Project
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

            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
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
                    <input type="text" class="form-control" id="url" name="url"
                        placeholder="Inserisci il link del progetto..." maxlength="1024">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea rows="3" class="form-control" id="description" name="description"
                        placeholder="Inserisci la descrizione..." maxlength="2000"></textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-outline-info">
                        Aggiungi
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
