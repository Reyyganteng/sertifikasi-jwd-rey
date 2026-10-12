@extends('layouts.app')

@section('content')
    <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white text-center py-4 border-0">
                    <h4 class="fw-bold mb-0">Login Admin</h4>
                    <small class="text-white-50">Masukkan akun Anda untuk melanjutkan</small>
                </div>
                <div class="card-body p-4 p-md-5 bg-white">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary">Email</label>
                            <input type="email" name="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                placeholder="nama@email.com" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary">Password</label>
                            <input type="password" name="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                placeholder="••••••••" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm rounded-3 py-2">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
