@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm col-md-8 mx-auto border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Skema Sertifikasi</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('skema.store') }}" method="POST">
                    @csrf

                    <!-- Kode Skema -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kode Skema</label>
                        <input type="text" name="kode_skema"
                            class="form-control @error('kode_skema') is-invalid @enderror" value="{{ old('kode_skema') }}">
                        @error('kode_skema')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama Skema -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Skema</label>
                        <input type="text" name="nama_skema"
                            class="form-control @error('nama_skema') is-invalid @enderror" value="{{ old('nama_skema') }}">
                        @error('nama_skema')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('skema.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
