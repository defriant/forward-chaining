@extends('layouts.user')

@section('content')
    <section class="row main">
                
        <div class="col-lg-7 main-content">
            <img src="{{ asset('assets/user/img/LOGO_4212482110071445.png') }}" alt="" class="landing-logo">
            <h2 class="landing-title">SISTEM REKOMENDASI JURUSAN</h2>
            <h2 class="landing-title">SMKN 05 BEKASI UTARA</h2>
            <h5 class="landing-subtitle">Kami dapat membantu dan merekomendasikan para calon siswa SMK dalam memilih jurusan.</h5>
            <button class="btn-start" id="btn-start" data-href="/ketentuan">Mulai <i class="far fa-arrow-right"></i></button>
        </div>
        <div class="col-lg-5 landing-img">
            <img src="{{ asset('assets/user/img/study-abroad-creative-icon_3242909.png') }}">
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $('#btn-start').on('click', function(){
            window.location = $(this).data('href');
        })
    </script>
@endsection