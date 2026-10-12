@extends('layouts.app')

@section('content')
    <!-- Alert Notifikasi Sukses / Gagal -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Data Skema Sertifikasi</h3>
        <a href="{{ route('skema.create') }}" class="btn btn-primary px-3 shadow-sm">+ Tambah Skema</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width: 5%;">No</th>
                            <th style="width: 15%;">Kode Skema</th>
                            <th style="width: 25%;">Nama Skema</th>
                            <th style="width: 40%;">Deskripsi</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($skemas as $index => $s)
                            <tr>
                                <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                                <td><span class="badge bg-secondary fs-6">{{ $s->kode_skema }}</span></td>
                                <td class="fw-semibold">{{ $s->nama_skema }}</td>
                                <td class="text-muted" style="white-space: pre-line;">{{ $s->deskripsi ?? '-' }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('skema.edit', $s->id) }}"
                                            class="btn btn-warning btn-sm px-2">Edit</a>
                                        <form action="{{ route('skema.destroy', $s->id) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Yakin hapus skema ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm px-2">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada data skema sertifikasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
