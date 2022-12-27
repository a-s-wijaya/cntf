@extends('layouts.main')
@section('content')
@component('components.navbar')
@endcomponent
<div class="container-fluid py-3 card-1 shadow fixed-top rounded-0">
    <div class="row justify-content-center">
        <h1 class="text-center my-auto text-white fw-bold">CNTF</h1>
    </div>
</div>

<div class="container my-5 pt-5 pb-4 bg-white shadow">
    <h3>Edit Profile</h3>
    <form method="POST" action="{{ route('profile.edit') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Name</label>
            <div class="col-12">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label">E-mail</label>
            
            <div class="col-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label" id="passLabel">New Password</label>
            
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
            <label for="password-confirm" class="col-md-4 col-form-label">Confirm Password</label> 
            <div class="col-12">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <div class="form-group row mb-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">
                    Edit User
                </button>
            </div>
        </div>
    </form>
</div>

<div class="container mb-5 bg-white py-3 shadow">
    <div class="row">
        <h3 class="ml-3">Proposal Anda</h3>
        @if (!$sdgLists->isEmpty())
        @foreach ($sdgLists as $sdgList)
        <div class="col-12 py-2 px-0">
            <a href="{{ route('sdgs.status', $sdgList->id) }}">
                <div class="card">
                    <div class="card-body">
                        @foreach($sdgList->emission as $emission)
                        <div class="row justify-content-between">
                            @if($emission->file)
                            <div class="col-3">
                                <img src="{{ asset($emission->file) }}" class="img-fluid" alt="">
                            </div>
                            @endif
                            <div class="col-6">
                                <h5 class="card-title font-weight-bolder">{{ $sdgList->code }}</h5>
                                <p class="card-text mb-0 font-weight-bold">{{ $emission->resource }}</p>
                                <p class="card-text mb-0">{{ $emission->description }}</p>
                                <p class="card-text mb-0">{{ $emission->co2_target }}</p>
                            </div>
                            <div class="col-3 text-center">
                                <small>{{ $sdgList->created_at->diffForHumans() }}</small>
                                <br>
                                <span class="badge font-weight-light px-2 py-1 
                                @if ($sdgList->status == 'waiting')
                                badge-secondary
                                @elseif ($sdgList->status == 'processing' || $sdgList->status == 'approved')
                                badge-warning text-danger
                                @elseif ($sdgList->status == 'rejected')
                                badge-danger
                                @else
                                badge-success
                                @endif">{{ $sdgList->status }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @else
        <h5 class="text-center mx-auto text-muted my-3">Anda Belum Mengajukan Proposal</h5>
        @endif
    </div>
</div>
@endsection
@push('scripts')
<script>
    window.onload = function() {
        var name = document.getElementById('name');
        var email = document.getElementById('email');
        var passLabel = document.getElementById('passLabel');
        name.addEventListener('input', function() {
            if(name.value == '{{ $user->name }}'){
                passLabel.innerHTML = "New Password";
            } else {
                passLabel.innerHTML = "Enter Password";
            }
        });
        email.addEventListener('input', function() {
            if(email.value == '{{ $user->email }}'){
                passLabel.innerHTML = "New Password";
            } else {
                passLabel.innerHTML = "Enter Password";
            }
        });
    }
</script>
@endpush