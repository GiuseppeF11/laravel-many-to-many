@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Welcome {{ auth()->user()->name }}!
                    </h1>
                    <br>
                    <p class="text-center">
                        Il login ti protegge grazie al <strong>middleware</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
