@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm col-md-8 mx-auto border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Data Peserta Sertifikasi</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('peserta.store') }}" method="POST">
                    @csrf

                    <!-- Skema -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Skema Sertifikasi</label>
                        <select name="skema_id" class="form-select @error('skema_id') is-invalid @enderror">
                            <option value="">-- Pilih Skema Sertifikasi --</option>
                            @foreach ($skemas as $skema)
                                <option value="{{ $skema->id }}" {{ old('skema_id') == $skema->id ? 'selected' : '' }}>
                                    {{ $skema->kode_skema }} - {{ $skema->nama_skema }}
                                </option>
                            @endforeach
                        </select>
                        @error('skema_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">NIK (16 Digit)</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                            value="{{ old('nik') }}" maxlength="16">
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama Peserta -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap Peserta</label>
                        <input type="text" name="nama_peserta"
                            class="form-control @error('nama_peserta') is-invalid @enderror"
                            value="{{ old('nama_peserta') }}">
                        @error('nama_peserta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- No HP -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">No. Telepon / HP </label>
                        <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                            value="{{ old('no_hp') }}" maxlength="13">
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
