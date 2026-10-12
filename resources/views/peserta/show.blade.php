@extends('layouts.app')

@section('content')
    <div class="card shadow-sm col-md-8 mx-auto border-0">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0 fw-bold">Detail Data Peserta</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <tr>
                    <th width="30%" class="bg-light">NIK</th>
                    <td>{{ $peserta->nik }}</td>
                </tr>
                <tr>
                    <th class="bg-light">Nama Peserta</th>
                    <td class="fw-bold">{{ $peserta->nama_peserta }}</td>
                </tr>
                <tr>
                    <th class="bg-light">Skema Sertifikasi</th>
                    <td>
                        {{ $peserta->skema->nama_skema ?? '-' }}
                        @if (optional($peserta->skema)->kode_skema)
                            <span class="badge bg-secondary">Kode: {{ $peserta->skema->kode_skema }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="bg-light">Email</th>
                    <td>{{ $peserta->email }}</td>
                </tr>
                <tr>
                    <th class="bg-light">No. HP</th>
                    <td>{{ $peserta->no_hp }}</td>
                </tr>
                <tr>
                    <th class="bg-light">Alamat</th>
                    <td>{{ $peserta->alamat }}</td>
                </tr>
            </table>
            <a href="{{ route('peserta.index') }}" class="btn btn-secondary mt-2">Kembali</a>
        </div>
    </div>
@endsection
