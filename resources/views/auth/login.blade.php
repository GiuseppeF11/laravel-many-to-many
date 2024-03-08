@extends('layouts.guest')

@section('main-content')
    <div class="text-light">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="login-box d-flex flex-column align-items-center">
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

                <!-- Remember Me -->
                <div class="mb-3">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                </div>

                <div class="mb-3">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="btn btn-outline-light">
                        Log in
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
