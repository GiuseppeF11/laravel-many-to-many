@extends('layouts.app')

@section('page-title', $technology->title.' Edit')

@section('main-content')
    <h1>
        {{ $technology->title }} Edit
    </h1>

    <div class="row">
        <div class="col py-4">
            <div class="mb-4">
                <a href="{{ route('admin.technologies.index') }}" class="btn btn-outline-info ">
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

            <form action="{{ route('admin.technologies.update', ['technology' => $technology->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input technology="text" class="form-control" id="title" name="title" value="{{ old('title', $technology->title) }}"
                        placeholder="Inserisci il titolo del progetto..." maxlength="100">
                </div>

                <div>
                    <button technology="submit" class="btn btn-outline-info">
                        Aggiorna
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection