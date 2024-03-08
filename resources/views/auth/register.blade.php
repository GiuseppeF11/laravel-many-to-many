@extends('layouts.guest')

@section('main-content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="text-light">
        <form method="POST" action="{{ route('register') }}">
            @csrf
    
            <div class="login-box d-flex flex-column align-items-center">
                <!-- Name -->
                <div class="d-flex flex-column text-center mb-3">
                    <label for="name">
                        Name
                    </label>
                    <input class="form-control" type="text" id="name" name="name">
                </div>
        
                <!-- Email Address -->
                <div class="d-flex flex-column text-center mb-3">
                    <label for="email">
                        Email
                    </label>
                    <input class="form-control" type="email" id="email" name="email">
                </div>
        
                <!-- Password -->
                <div class="d-flex flex-column text-center mb-3">
                    <label for="password">
                        Password
                    </label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
        
                <!-- Confirm Password -->
                <div class="d-flex flex-column text-center mb-3">
                    <label for="password_confirmation">
                        Conferma Password
                    </label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                </div>
        
                <div class="d-flex align-items-center mb-3">
                    <a href="{{ route('login') }}" class="px-3">
                        {{ __('Already registered?') }}
                    </a>
        
                    <button type="submit" class="btn btn-outline-light">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

<style lang="scss" scoped>
    .login-box {
        width: 50%;
        margin: 0 auto;
        border-radius: 20px;
        box-shadow: 0 0 10px white;
        height: 80vh;
        background-color: #53d4bec9;
        justify-content: center;
    }

    label {
        font-weight: 600;
        font-size: 20px;
    }
</style>