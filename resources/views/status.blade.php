@extends('layouts.main')
@section('content')
@push('styles')
<style>
    .d-flex {
        height: 100vh;
    }
    h3.text-danger{
        border-radius: 20px;
    }
    h3.bg-secondary {
        background-color: #d9d9d9 !important;
        border-radius: 20px;
    }
</style>
@endpush
@component('components.navbar')
@endcomponent
<div class="container-fluid bg-white px-0 fixed-top">
    <div class="card card-1 text-white rounded-0">
        <div class="col-2">
            <a href="{{ route('sdgs', $sdgList->sdgs_id) }}" class="btn btn-outline-light mx-1 my-3 rounded-circle"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
</div>

<div class="d-flex align-items-center">
    <div class="container text-center">
        @if ($sdgList->status == 'waiting')
        @component('components.loading')
        @endcomponent
        <h3>Mohon tunggu <br> Sedang menunggu respon..</h3>
        @elseif ($sdgList->status == 'processing')
        <h5 class="mb-4">Proposal anda sedang</h5>
        <h3 class="text-danger w-50 bg-warning w-50 py-2 mx-auto mb-4">Diproses</h3>
        <h5>Silahkan kembali ke menu sebelumnya</h5>
        @elseif ($sdgList->status == 'approved')
        <h5>Proposal anda telah <span class="text-success">Disetujui</span></h5>
        <h5 class="mb-4">Silahkan kembali ke menu sebelumnya</h5>
        <h3 class="bg-secondary shadow-sm w-50 py-2 mx-auto text-success font-weight-bolder mb-4"><i class="far fa-check-circle px-1"></i>APPROVED</h3>
        <h5>Kode proposal anda <span class="font-weight-bold">{{ $sdgList->code }}</span></h5>
        @elseif ($sdgList->status == 'rejected')
        <h5>Proposal anda <span class="text-danger">Tidak disetujui</span></h5>
        <h5 class="mb-4">Naikkan target baru atau ke menu sebelumnya</h5>
        <h3 class="bg-secondary shadow-sm w-50 py-2 mx-auto text-danger font-weight-bolder mb-4">
            @if ($sdgList->sdgs_id == 2)
                @foreach ($sdgList->emission as $emission)
                    {{ $emission->co2_target }}
                @endforeach
            @endif
        </h3>
        <form action="{{ route('sdgs.resubmit', $sdgList->id) }}" method="POST">
            @csrf
            <div class="form-group row mb-3">
                <div class="col-6 mx-auto">
                    <button id="submit" type="submit" class="btn btn-primary w-100">
                        Re-Submit
                    </button>
                </div>
            </div>
        </form>
        @elseif ($sdgList->status == 'finished')
        <h3>Finished</h3>
        @endif
    </div>
</div>

@endsection
@push('scripts')
<script>
</script>
@endpush