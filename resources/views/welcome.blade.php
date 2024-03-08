@extends('layouts.guest')

@section('main-content')
    <div class="row welcome">
        <div class="col">
            <h1 class="text-center">Welcome to my site!</h1>
        </div>
    </div>

    <div class="presentation text-center text-light">
        <h2 class="mb-4">
            Hello World! This is my first official site. 
        </h2>
        <h4>
            Check out some of my <a href="{{ route('projects.index') }}">projects</a>, or <a href="{{ route('register') }}">register</a> and add your own projects!
        </h4>
        <h4>
            Good fun!
        </h4>
    </div>
@endsection

<style lang="scss" scoped>
    .welcome {
        background-color: #4CB1A2;
        color: white;
        border-radius: 10px;
        transition: ease 0.5s;
        box-shadow: 0 0 10px white;
        &:hover {
            animation: bounce 0.5s infinite alternate;
            cursor:pointer;
        }
    }
    @keyframes bounce {
        to { transform: scale(1.01); }
    }

    .presentation {
        height: 50vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
</style>
