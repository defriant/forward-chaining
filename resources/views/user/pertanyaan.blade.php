@extends('layouts.user')
@section('content')
    <section class="row main">
        <div class="col-lg-8 offset-lg-2 main-content">
            <hr class="field-hr">
            <h5 class="field-subtitle">PERTANYAAN</h5>
            <h2 class="field-title" id="question">{{ $no }}. {{ $pertanyaan->pertanyaan }}</h2>
            <div class="field-box">
                <div class="loading-outline">
                    <div class="loading-progress"></div>
                </div>
                <div class="field-box-content">
                    <h5 class="field-subtitle">JAWABAN</h5>
                    <input type="hidden" id="idAnalisa" value="{{ $id }}">
                    <input type="hidden" id="no" value="{{ $no }}">
                    <input type="hidden" id="premis" value="{{ $pertanyaan->id }}">
                    <button class="btn-answer" data-answer="1">Ya <i class="far fa-thumbs-up"></i></button>
                    <button class="btn-answer" data-answer="0">Tidak <i class="far fa-thumbs-down"></i></button>
                    <!-- <button class="btn-next">Lanjut <i class="far fa-arrow-right"></i></button> -->
                </div>
            </div>
        </div>
    </section>
@endsection