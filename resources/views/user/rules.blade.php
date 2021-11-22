@extends('layouts.user')
@section('content')
<section class="row main">
    <div class="col-lg-8 offset-lg-2 main-content">
        <hr class="field-hr">
        <h2 class="field-title">KETENTUAN</h2>
        <div class="field-box">
            <div class="field-box-content">
                <ul class="rules">
                    <li><i class="far fa-check-circle"></i>Sistem rekomendasi ini terdiri dari beberapa pertanyaan.</li>
                    <li><i class="far fa-check-circle"></i>Tidak ada batasan waktu untuk menjawab pertanyaan.</li>
                    <li><i class="far fa-check-circle"></i>Jawab pertanyaan sesuai dengan kompetensi anda sehingga,</li>
                    <li><i class="far fa-check-circle"></i>Kami dapat merekomendasikan jurusan apa yang sebaiknya dipilih</li>
                </ul>
                <button class="btn-start" id="btn-start" data-href="/identitas">Mulai <i class="far fa-arrow-right"></i></button>
            </div>
        </div>
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