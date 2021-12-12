@extends('layouts.user')
@section('content')
    <section class="row main-result">
        <div class="col-lg-8 offset-lg-2 main-content">
            @if ($analisa == null)
                <div class="analisa-null">
                    <h5>HASIL REKOMENDASI TIDAK DITEMUKAN</h5>
                    <button class="btn-start" id="btn-start" data-href="/ketentuan">Analisa Sekarang <i class="far fa-arrow-right"></i></button>
                </div>
            @else
                @if ($analisa->hasil_akhir == 'failed')
                    <hr class="field-hr">
                    <h5 class="field-title">HASIL REKOMENDASI</h5>
                    <h5 class="recomendation-title"></h5>
                    <div class="recomendation">
                        <div class="major-recomendation">
                            <h4>GAGAL MENDAPATKAN HASIL REKOMENDASI</h4>
                            <i class="far fa-frown failed-icon"></i>
                            <form method="POST" action="/analisa" id="form-repeat">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $analisa->id }}">
                            </form>
                            <button class="btn-repeat" id="repeat-analisa">Ulangi Analisa <i class="far fa-redo"></i></button>
                        </div>
                    </div>
                    <div class="recomendation-identity">
                        <h5><i class="far fa-user"></i> &nbsp;{{ $analisa->nama }}</h5>
                        <h5><i class="far fa-envelope"></i> &nbsp;{{ $analisa->email }}</h5>
                        <h5>Nomor Rekomendasi : {{ $analisa->id }}</h5>
                    </div>
                    <div class="q-and-a">
                        <hr>
                        <span>PERTANYAAN DAN JAWABAN</span>
                        <hr>
                    </div>
                    <div class="field-box">
                        <div class="field-box-content">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($analisa->hasil as $p)
                                <h5 class="field-subtitle">{{ $no }}. {{ $p->premis->pertanyaan }}</h5>
                                <div class="answers">
                                    @if ($p->jawaban == 1)
                                        <div class="answer active">
                                            Ya <i class="far fa-thumbs-up"></i>
                                        </div>
                                    @else
                                        <div class="answer">
                                            Ya <i class="far fa-thumbs-up"></i>
                                        </div>
                                    @endif
        
                                    @if ($p->jawaban == 0)
                                        <div class="answer active">
                                            Tidak <i class="far fa-thumbs-down"></i>
                                        </div>
                                    @else   
                                        <div class="answer">
                                            Tidak <i class="far fa-thumbs-down"></i>
                                        </div>
                                    @endif
                                </div>

                                @if (count($analisa->hasil) != $no)
                                    <hr class="q-and-a-hr">
                                @endif
        
                                @php
                                    $no++
                                @endphp
                            @endforeach
                        </div>
                    </div>
                @else
                    <hr class="field-hr">
                    <h5 class="field-title">HASIL REKOMENDASI</h5>
                    <h5 class="recomendation-title">BERDASARKAN JAWABAN ANDA, KAMI MEREKOMENDASIKAN JURUSAN.</h5>
                    <div class="recomendation">
                        <div class="major-recomendation">
                            <h4>{{ $analisa->hasil_akhir }}</h4>
                            <div class="recomendation-star">
                                <i class="fas fa-star star-sm"></i>
                                <i class="fas fa-star star-md"></i>
                                <i class="fas fa-star star-lg"></i>
                                <i class="fas fa-star star-md"></i>
                                <i class="fas fa-star star-sm"></i>
                            </div>
                            <br>
                            <p>{{ $analisa->deskripsi }}</p>
                            <br>
                        </div>
                    </div>
                    <div class="q-and-a">
                        <hr>
                        <span>INFORMASI PENGGUNA</span>
                        <hr>
                    </div>
                    <div class="recomendation-identity">
                        <h5><i class="far fa-user"></i> &nbsp;{{ $analisa->nama }}</h5>
                        <h5><i class="far fa-envelope"></i> &nbsp;{{ $analisa->email }}</h5>
                        <h5>Nomor Rekomendasi : {{ $analisa->id }}</h5>
                    </div>
                    <br>
                    <div class="q-and-a">
                        <hr>
                        <span>PERTANYAAN DAN JAWABAN</span>
                        <hr>
                    </div>
                    <div class="field-box">
                        <div class="field-box-content">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($analisa->hasil as $p)
                                <h5 class="field-subtitle">{{ $no }}. {{ $p->pertanyaan }}</h5>
                                <div class="answers">
                                    @if ($p->jawaban == 1)
                                        <div class="answer active">
                                            Ya <i class="far fa-thumbs-up"></i>
                                        </div>
                                    @else
                                        <div class="answer">
                                            Ya <i class="far fa-thumbs-up"></i>
                                        </div>
                                    @endif
        
                                    @if ($p->jawaban == 0)
                                        <div class="answer active">
                                            Tidak <i class="far fa-thumbs-down"></i>
                                        </div>
                                    @else   
                                        <div class="answer">
                                            Tidak <i class="far fa-thumbs-down"></i>
                                        </div>
                                    @endif
                                </div>

                                @if (count($analisa->hasil) != $no)
                                    <hr class="q-and-a-hr">
                                @endif
                                
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </section>
@endsection

@if ($analisa == null)
    @section('scripts')
        <script>
            $('#btn-start').on('click', function(){
                window.location = $(this).data('href');
            })
        </script>
    @endsection
@endif