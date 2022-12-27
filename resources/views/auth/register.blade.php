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
        height: 1000px;
    }
    .btn-primary {
        background-color: #667AE1;
        border-color: #667AE1;
    }
</style>
@endpush
@section('content')
<div class="bg-white" id="card">
    <div class="container">
        <div class="row px-2 mx-auto pt-5 pb-3">
            <img src="{{ asset('img/aiia-logo 1.png') }}" alt="Logo" class="mx-auto pt-2 pb-5">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>
                    
                    <div class="col-12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>
                    
                    <div class="col-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        
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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                    
                    <div class="col-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                
                <div class="form-group row mb-0">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <hr>
        <div class="row px-2 mx-auto py-2">
            <div class="col-12">
                <p class="text-center">Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush