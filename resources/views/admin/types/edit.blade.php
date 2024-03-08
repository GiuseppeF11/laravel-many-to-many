@extends('layouts.app')

@section('page-title', $type->title.' Edit')

@section('main-content')
    <h1>
        {{ $type->title }} Edit
    </h1>

    <div class="row">
        <div class="col py-4">
            <div class="mb-4">
                <a href="{{ route('admin.types.index') }}" class="btn btn-outline-info ">
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

            <form action="{{ route('admin.types.update', ['type' => $type->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $type->title) }}"
                        placeholder="Inserisci il titolo del progetto..." maxlength="100">
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">URL</label>
                    <input type="text" class="form-control" id="url" name="url" value="{{ old('url', $type->url) }}"
                        placeholder="Inserisci il link del progetto..." maxlength="1024">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea rows="3" class="form-control" id="description" name="description" placeholder="Inserisci la descrizione..." maxlength="2000">{{ old('description', $type->description) }} </textarea>
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