@extends('layouts.admin')
@section('content')
<div class="panel panel-headline">
    <div class="panel-heading">
        
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fas fa-thumbs-up"></i></span>
                    <p>
                        <span class="number">{{ $analisa }}</span>
                        <span class="title">Hasil Analisa</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fas fa-thumbs-down"></i></span>
                    <p>
                        <span class="number">{{ $failed }}</span>
                        <span class="title">Gagal Analisa</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fas fa-bullseye-arrow"></i></span>
                    <p>
                        <span class="number">{{ $goal }}</span>
                        <span class="title">Jurusan</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fas fa-question"></i></span>
                    <p>
                        <span class="number">{{ $premis }}</span>
                        <span class="title">Pertanyaan</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="panel-heading">
                <h3 class="panel-title">Hasil Analisa</h3>
            </div>
            <div class="panel-body" id="hasil-analisa">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No. Rekomendasi</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Hasil Rekomendasi</th>
                        </tr>
                    </thead>
                    <tbody id="hasil-rekomendasi">
                        @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <td class="table-loading"><p>#</p></td>
                            <td class="table-loading"><p>#</p></td>
                            <td class="table-loading"><p>#</p></td>
                            <td class="table-loading"><p>#</p></td>
                        </tr>
                        @endfor
                    </tbody>
                </table>

                <div style="display: flex; justify-content: center">
                    <ul class="pagination">
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4 dashboard-logo">
            <img src="{{ asset('assets/user/img/LOGO_4212482110071445.png') }}">
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $.ajax({
            type:'post',
            url:'/hasil-rekomendasi',
            success:function(data){
                console.log(data.data.length);
                if (data.data.length > 0) {
                    $('#hasil-rekomendasi').empty()
                    $.each(data.data, function(i, v){
                        $('#hasil-rekomendasi').append(`<tr>
                                                            <td>`+v.id+`</td>
                                                            <td>`+v.nama+`</td>
                                                            <td>`+v.email+`</td>
                                                            <td>`+v.hasil_akhir+`</td>
                                                        </tr>`)
                    })

                    if (data.prev_page_url != null) {
                        $('.pagination').append(`<li id="prevPage">
                                                    <a href="`+data.prev_page_url+`" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>`)
                    }else{
                        $('.pagination').append(`<li id="prevPage" class="disabled">
                                                    <a href="" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>`)
                    }

                    for (let i = 1; i <= data.last_page; i++) {
                        if (i == data.current_page) {
                            $('.pagination').append(`<li class="page active" id="page-`+i+`"><a href="?page=`+i+`">`+i+`</a></li>`)
                        }else{
                            $('.pagination').append(`<li class="page" id="page-`+i+`"><a href="?page=`+i+`">`+i+`</a></li>`)
                        }
                    }

                    if (data.next_page_url != null) {
                        $('.pagination').append(`<li id="nextPage">
                                                    <a href="`+data.next_page_url+`" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>`)
                    }else{
                        $('.pagination').append(`<li id="nextPage" class="disabled">
                                                    <a href="" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>`)
                    }
                    
                }else{
                    $('#hasil-analisa').html(`<br><br><br>
                                                <h4 class="text-center" style="opacity: .75"><i>Belum ada hasil analisa</i></h4>
                                                <br><br><br><br>`)
                }

                paginationLink()
            }
        })

        function paginationLink() {
            $('.pagination li a').on('click', function(e){
                e.preventDefault()
                if ($(this).attr('href').length != 0) {
                    let page = $(this).attr('href').split('page=')[1];
                    $('.page').removeClass('active')
                    $('#page-'+page).addClass('active')
                    $.ajax({
                        type:'post',
                        url:'hasil-rekomendasi?page='+page,
                        success:function(data){
                            $('#hasil-rekomendasi').empty()
                            $.each(data.data, function(i, v){
                                $('#hasil-rekomendasi').append(`<tr>
                                                                    <td>`+v.id+`</td>
                                                                    <td>`+v.nama+`</td>
                                                                    <td>`+v.email+`</td>
                                                                    <td>`+v.hasil_akhir+`</td>
                                                                </tr>`)
                            })

                            if (data.prev_page_url != null) {
                                $('#prevPage').removeClass('disabled')
                                $('#prevPage a').attr('href', data.prev_page_url)
                            }else{
                                $('#prevPage').addClass('disabled')
                                $('#prevPage a').attr('href', '')
                            }

                            if (data.next_page_url != null) {
                                $('#nextPage').removeClass('disabled')
                                $('#nextPage a').attr('href', data.next_page_url)
                            }else{
                                $('#nextPage').addClass('disabled')
                                $('#nextPage a').attr('href', '')
                            }
                        }
                    })
                }
            })
        }
    </script>
@endsection
