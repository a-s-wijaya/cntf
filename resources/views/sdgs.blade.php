@extends('layouts.main')
@section('content')
@push('styles')
<style>
</style>
@endpush
<div class="container-fluid bg-white px-0">
    <div class="card card-{{ $sdg->id }} text-white rounded-0">
        <div class="col-2">
            <a href="{{ route('home') }}" class="btn btn-outline-light mx-1 mt-3 rounded-circle"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="card-body">
            <h1 class="my-auto mx-auto text-center pb-1">CNTF</h1>
            <h3 class="my-auto mx-auto text-center pb-1">{{ $sdg->title }}</h3>
        </div>
    </div>
</div>

@if ($sdg->id == 2)
<div class="container-fluid py-3 bg-white shadow-sm">
    <form method="POST" action="{{ route($sdg->id.'.store') }}" id="submitForm" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="resource" class="col-md-4 col-form-label">Resource</label>
            <div class="col-12">
                <select name="resource" id="resource" class="form-control" required>
                    <option value="Electricity">Electricity</option>
                    <option value="Water">Water</option>
                    <option value="LNG">LNG</option>
                    <option value="LPG">LPG</option>
                    <option value="Coal">Coal</option>
                    <option value="Gasoline">Gasoline</option>
                    <option value="Oil">Oil</option>
                </select>
                @error('resource')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="uploads" class="col-md-4 col-form-label">Photo/Document</label>
            <div class="col-12">
                <input id="uploads" type="file" class="form-control" name="uploads">
                @error('uploads')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label">Description</label>
            <div class="col-12">
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="co2_target" class="col-md-4 col-form-label">CO2 Target</label>
            <div class="col-12">
                <input id="co2_target" type="text" class="form-control @error('co2_target') is-invalid @enderror" name="co2_target" value="{{ old('co2_target') }}" required autocomplete="co2_target">
                @error('co2_target')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-3">
            <div class="col-12">
                <button id="submit" type="submit" class="btn btn-primary w-100">
                    {{ __('Submit') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endif

<div class="container pb-3">
    <div class="row">
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
        <h5 class="text-center mx-auto text-muted my-3">Belum Ada Proposal</h5>
        @endif
    </div>
</div>
@endsection
@push('scripts')
<script>
    window.onload = function() {      
        document.getElementById('submitForm').addEventListener('submit', function(e) {
            document.getElementById('submit').disabled = true;
        });
    };
</script>
@endpush