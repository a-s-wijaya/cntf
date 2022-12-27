@extends('layouts.main')
@push('styles')
<style>
    html {
        height: 100%;
    }
    body {
        background: linear-gradient(180deg, #213CCC 0%, #4683DF 100%);
        height: 100%;
        overflow: hidden;
    }
    #card{
        border-radius: 30px;
        height: 1000px;
    }
    .btn-primary {
        background-color: #667AE1;
        border-color: #667AE1;
    }
</style>
@endpush
@section('content')
<div class="mt-5 bg-white" id="card">
    <div class="container">
        <div class="row px-2 mx-auto pt-5 pb-3">
            <img src="{{ asset('img/aiia-logo 1.png') }}" alt="Logo" class="mx-auto pt-2 pb-5">
            <form method="POST" action="{{ route('login') }}" class="w-100">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>
                    
                    <div class="col-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                    <div class="col-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="col-12 mx-auto">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link text-center w-100" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <hr>
        <div class="row px-2 mx-auto py-2">
            <div class="col-12">
                <p class="text-center">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush