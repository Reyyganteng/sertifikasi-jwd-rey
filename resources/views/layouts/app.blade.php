<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sertifikasi JWD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @auth
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}">Aplikasi Sertifikasi</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('skema.index') }}">Data Skema</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('peserta.index') }}">Data Peserta</a></li>
                    </ul>
                    <form action="{{ route('logout') }}" method="POST" class="d-flex">
                        @csrf
                        <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    @endauth

    <div class="container">
        @if (session('succcess'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
    <script href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
