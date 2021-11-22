<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SMKN 05 KOTA BEKASI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/font-awesome-pro-master/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user/css/main.css') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/user/img/LOGO_4212482110071445.png') }}">
</head>
<body>
    <header class="header">
        <div class="container header-container">
            <a href="/" class="header-logo">SMKN 05</a>
            <div class="header-search">
                <form id="search-rekomendasi">
                    <div class="search-group">
                        <i class="fas fa-search"></i>
                        <input type="text" id="search-input" class="search-input" placeholder="Cari Hasil Rekomendasi ...">
                    </div>
                </form>
            </div>
            <!-- <div class="header-link">
                <a href="#" class="header-link">Visi dan Misi</a>
                <a href="#" class="header-link">Struktur Organisasi</a>
                <a href="#" class="header-link">Gallery</a>
            </div> -->
            <a href="/login" class="btn-login">LOGIN <i class="far fa-sign-in"></i></a>
        </div>
    </header>
    <main class="container" id="main">
        @yield('content')
    </main>
    <script src="{{ asset('assets/user/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>