@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card shadow border-0 col-md-8 mx-auto rounded-3">
            <div class="card-header bg-warning text-dark py-3">
                <h4 class="mb-0 fw-bold">Edit Data Peserta Sertifikasi</h4>
            </div>
            <div class="card-body p-4">

                {{-- Alert jika ada notifikasi sukses/error dari session --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Skema Sertifikasi</label>
                        <select name="skema_id" class="form-select @error('skema_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Skema Sertifikasi --</option>
                            @foreach ($skemas as $skema)
                                <option value="{{ $skema->id }}"
                                    {{ old('skema_id', $peserta->skema_id) == $skema->id ? 'selected' : '' }}>
                                    {{ $skema->kode_skema }} - {{ $skema->nama_skema }}
                                </option>
                            @endforeach
                        </select>
                        @error('skema_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">NIK (16 Digit)</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                            value="{{ old('nik', $peserta->nik) }}" maxlength="16" required>
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap Peserta</label>
                        <input type="text" name="nama_peserta"
                            class="form-control @error('nama_peserta') is-invalid @enderror"
                            value="{{ old('nama_peserta', $peserta->nama_peserta) }}" required>
                        @error('nama_peserta')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $peserta->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">No. Telepon / HP</label>
                        <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                            value="{{ old('no_hp', $peserta->no_hp) }}" required>
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" required>{{ old('alamat', $peserta->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning fw-semibold px-4">Update Data</button>
                        <a href="{{ route('peserta.index') }}" class="btn btn-secondary px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
