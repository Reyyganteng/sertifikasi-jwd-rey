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
        <h3 class="fw-bold">Data Peserta Sertifikasi</h3>
        <a href="{{ route('peserta.create') }}" class="btn btn-primary px-3 shadow-sm">+ Tambah Peserta</a>
    </div>

    <form action="{{ route('peserta.index') }}" method="GET" class="mb-3">
        <div class="input-group shadow-sm">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Nama atau NIK..."
                value="{{ $search }}">
            <button class="btn btn-primary px-4" type="submit">Cari</button>
        </div>
    </form>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width: 4%;">No</th>
                            <th style="width: 12%;">NIK</th>
                            <th style="width: 15%;">Nama</th>
                            <th style="width: 15%;">Email</th>
                            <th style="width: 15%;">Skema</th>
                            <th style="width: 12%;">No HP</th>
                            <th style="width: 15%;">Alamat</th>
                            <th class="text-center" style="width: 12%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesertas as $index => $p)
                            <tr>
                                <td class="text-center fw-bold">
                                    {{ ($pesertas->currentPage() - 1) * $pesertas->perPage() + $loop->iteration }}</td>
                                <td><span class="badge bg-secondary font-monospace">{{ $p->nik }}</span></td>
                                <td class="fw-semibold">{{ $p->nama_peserta }}</td>
                                <td>{{ $p->email }}</td>
                                <td><span class="badge bg-info text-dark">{{ $p->skema->nama_skema ?? '-' }}</span></td>
                                <td>{{ $p->no_hp }}</td>
                                <td class="text-muted">{{ Str::limit($p->alamat, 30) }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('peserta.show', $p->id) }}"
                                            class="btn btn-info btn-sm text-white px-2">Detail</a>
                                        <a href="{{ route('peserta.edit', $p->id) }}"
                                            class="btn btn-warning btn-sm px-2">Edit</a>
                                        <form action="{{ route('peserta.destroy', $p->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin hapus data peserta ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm px-2">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">Data peserta tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $pesertas->appends(['search' => $search])->links() }}
    </div>
@endsection
