@extends('layouts.main')
@section('content')
@push('styles')
<style>
    div h3{
        position: relative;
        z-index: 1;
    }
    a {
        text-decoration: none;
    }
    a:hover {
        text-decoration: none;
    }
</style>
@endpush
@component('components.navbar')
@endcomponent
<div class="container-fluid py-3 card-1 shadow fixed-top rounded-0">
    <div class="row justify-content-center">
        <img src="{{ asset('img/aiia-logo.png') }}" alt="Logo" class="mx-auto py-2">
    </div>
    <div class="row justify-content-center">
        <h2 class="text-center my-auto text-white fw-bold">CNTF</h2>
    </div>
</div>

<div class="container my-5 pt-5 pb-4">
    <div class="row mt-5">
        @foreach ($sdgs as $sdg)
        <div class="col-6 px-1">
            <a href="{{ route('sdgs', $sdg->id) }}">
                <div class="card my-2 card-{{ $sdg->id }} text-white">
                    <div class="card-body">
                        <h3 class="my-auto mx-auto text-center pb-5">{{ $sdg->title }}</h3>
                        <img src="{{ asset($sdg->icon) }}" alt="{{ $sdg->title }}" class="card-bg" @if ($sdg->id == 2)
                            style="height: 65px; width: 100px;"
                        @endif>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection