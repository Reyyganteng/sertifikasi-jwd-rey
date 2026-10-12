@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Dashboard</h2>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card bg-info text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Skema Sertifikasi</h5>
                    <h2 class="display-4 fw-bold">{{ $totalSkema }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card bg-success text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Peserta Sertifikasi</h5>
                    <h2 class="display-4 fw-bold">{{ $totalPeserta }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
