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
            <img src="https://beecrowd.io/wp-content/uploads/2022/08/Beecrowd-Agosto-6-02-larger.png" alt="{{ $project->title }}" class="card-img-top">

            <div class="card-body">
                <ul>
                    <li>
                        Data creazione: {{ $project->created_at->format('d/m/Y - H:i') }}
                    </li>

                    <li>
                        {{ $project->type->title }}
                    </li>
                </ul>
                <p>
                    {{ $project->description }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
