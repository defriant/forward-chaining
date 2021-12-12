$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function getGoal() {
    $.ajax({
        type:'post',
        url:'/admin/goal',
        success:function(data){
            $('#tbody').empty()
            $.each(data, function(i,v){
                let tr = `<tr>
                            <td>`+v.id+`</td>
                            <td class="pertanyaan"><span>`+v.jurusan+`</span></td>
                            <td>
                                <button class="btn-detail goal-detail" data-id="`+v.id+`">
                                    <i class="far fa-eye"></i>
                                    <h5>Detail</h5>
                                    <i class="far fa-arrow-right detail-arrow"></i>
                                </button>
                            </td>
                        </tr>`
                $('#tbody').append(tr)
            })
            goalDetail()
        }
    })
}

$('#btn-add-goal').on('click', function(){
    if ($('#addJurusan').val().length == 0) {
        alert('Masukkan jurusan')
    }else if($('#addDeskripsi').val().length == 0){
        alert('Masukkan deskripsi')
    }else if($('input[name="addPremis"]:checked').length == 0){
        alert('Pilih relasi pertanyaan')
    }else{
        $('#btn-add-goal').attr('disabled', 'disabled')
        let jurusan = $('#addJurusan').val()
        let deskripsi = $('#addDeskripsi').val()
        let idPertanyaan = []
        $('input[name="addPremis"]:checked').each(function(){
            idPertanyaan.push($(this).val())
        })
    
        $.ajax({
            type:'post',
            url:'/admin/goal/add',
            data:{
                jurusan:jurusan,
                deskripsi:deskripsi,
                idPertanyaan:idPertanyaan
            },
            success:function(data){
                toastr.options = {
                    "timeOut": "5000",
                }
                toastr['success']('Goal '+data+' berhasil ditambahkan');
                $('#btn-add-goal').removeAttr('disabled')
                $('#addGoal').modal('toggle')
                $('#addJurusan').val('')
                $('input[name="addPremis"]').prop('checked', false)
                getGoal()
            }
        })
    }
})

function goalDetail() {
    $('.goal-detail').on('click', function(){
        $('.goal-detail').removeClass('active')
        $(this).addClass('active')
        $('#detail-goal').html(`<div class="panel-body">
                                                <h4 class="data-empty"><i class="fad fa-spinner-third fa-spin detail-loading"></i>
                                            </div>`)
        let idGoal = $(this).data('id')
        $.ajax({
            type:'post',
            url:'/admin/goal-relasi',
            data:{
                idGoal:idGoal
            },
            success:function(data){
                $('#detail-goal').html(data)
                saveGoal()
                deleteGoal()
            }
        })
    })
}

function saveGoal() {
    $('#goal-save').on('click', function(){
        $('#goal-save').attr('disabled', 'disabled')
        let idGoal = $('#idGoal').val()
        let jurusan = $('#jurusan').val()
        let deskripsi = $('#deskripsi').val()
        let idPertanyaan = []
        $('input[name="premis"]:checked').each(function(){
            idPertanyaan.push($(this).val())
        })
        $.ajax({
            type:'post',
            url:'/admin/goal/update',
            data:{
                idGoal:idGoal,
                jurusan:jurusan,
                deskripsi:deskripsi,
                idPertanyaan:idPertanyaan
            },
            success:function(response){
                toastr.options = {
                    "timeOut": "5000",
                }
                toastr['success']('Goal '+response+' berhasil diubah');
                $('#goal-save').removeAttr('disabled')
                getGoal()
            }
        })
    })
}

function deleteGoal() {
    $('#btn-delete-goal').on('click', function(){
        $('#btn-delete-goal').attr('disabled', 'disabled')
        $.ajax({
            type:'post',
            url:'/admin/goal/delete',
            data:{
                idGoal:$(this).data('id')
            },
            success:function(data){
                toastr.options = {
                    "timeOut": "5000",
                }
                toastr['success']('Goal '+data+' dihapus');
                $('#btn-delete-goal').removeAttr('disabled')
                $('#detail-goal').html(`<div class="panel-body">
                                            <h4 class="data-empty"><i>TIDAK ADA DATA GOAL YANG DIPILIH</i></h4>
                                        </div>`)
                $('#deleteGoal').modal('toggle')
                $('body').removeClass('modal-open')
                $('.modal-backdrop').remove()
                getGoal()
            }
        })
    })
}

function getPertanyaan() {
    $.ajax({
        type:'post',
        url:'/admin/pertanyaan',
        success:function(data){
            $('#tbody').empty()
            $.each(data, function(i,v){
                let tr = `<tr>
                            <td>`+v.id+`</td>
                            <td class="pertanyaan"><span>`+v.pertanyaan+`</span></td>
                            <td>
                                <button class="btn-detail pertanyaan-detail" data-id="`+v.id+`">
                                    <i class="far fa-eye"></i>
                                    <h5>Detail</h5>
                                    <i class="far fa-arrow-right detail-arrow"></i>
                                </button>
                            </td>
                        </tr>`
                $('#tbody').append(tr)
            })
            pertanyaanDetail()
        }
    })
}

$('#btn-add-pertanyaan').on('click', function(){
    if ($('#addPremis').val().length == 0) {
        alert('Masukkan jurusan')
    }else if($('input[name="addGoal"]:checked').length == 0){
        alert('Pilih relasi pertanyaan')
    }else{
        $('#btn-add-pertanyaan').attr('disabled', 'disabled')
        let pertanyaan = $('#addPremis').val()
        let idGoal = []
        $('input[name="addGoal"]:checked').each(function(){
            idGoal.push($(this).val())
        })
    
        $.ajax({
            type:'post',
            url:'/admin/pertanyaan/add',
            data:{
                pertanyaan:pertanyaan,
                idGoal:idGoal
            },
            success:function(data){
                toastr.options = {
                    "timeOut": "5000",
                }
                toastr['success']('Pertanyaan '+data+' berhasil ditambahkan');
                $('#btn-add-pertanyaan').removeAttr('disabled')
                $('#addPertanyaan').modal('toggle')
                $('#addPremis').val('')
                $('input[name="addGoal"]').prop('checked', false)
                getPertanyaan()
            }
        })
    }
})

function pertanyaanDetail() {
    $('.pertanyaan-detail').on('click', function(){
        $('.pertanyaan-detail').removeClass('active')
        $(this).addClass('active')
        $('#detail-pertanyaan').html(`<div class="panel-body">
                                                <h4 class="data-empty"><i class="fad fa-spinner-third fa-spin detail-loading"></i>
                                            </div>`)
        let idPertanyaan = $(this).data('id')
        $.ajax({
            type:'post',
            url:'/admin/pertanyaan-relasi',
            data:{
                idPertanyaan:idPertanyaan
            },
            success:function(data){
                $('#detail-pertanyaan').html(data)
                savePertanyaan()
                deletePertanyaan()
            }
        })
    })
}

function savePertanyaan() {
    $('#pertanyaan-save').on('click', function(){
        $('#pertanyaan-save').attr('disabled', 'disabled')
        let idPertanyaan = $('#idPertanyaan').val()
        let pertanyaan = $('#pertanyaan').val()
        let idGoal = []
        $('input[name="goal"]:checked').each(function(){
            idGoal.push($(this).val())
        })
        $.ajax({
            type:'post',
            url:'/admin/pertanyaan/update',
            data:{
                idPertanyaan:idPertanyaan,
                pertanyaan:pertanyaan,
                idGoal:idGoal
            },
            success:function(response){
                toastr.options = {
                    "timeOut": "5000",
                }
                toastr['success']('Pertanyaan '+response+' berhasil diubah');
                $('#pertanyaan-save').removeAttr('disabled')
                getPertanyaan()
            }
        })
    })
}

function deletePertanyaan() {
    $('#btn-delete-pertanyaan').on('click', function(){
        $('#btn-delete-pertanyaan').attr('disabled', 'disabled')
        $.ajax({
            type:'post',
            url:'/admin/pertanyaan/delete',
            data:{
                idPertanyaan:$(this).data('id')
            },
            success:function(data){
                toastr.options = {
                    "timeOut": "5000",
                }
                toastr['success']('Pertanyaan '+data+' dihapus');
                $('#btn-delete-pertanyaan').removeAttr('disabled')
                $('#detail-pertanyaan').html(`<div class="panel-body">
                                            <h4 class="data-empty"><i>TIDAK ADA DATA PERTANYAAN YANG DIPILIH</i></h4>
                                        </div>`)
                $('#deletePertanyaan').modal('toggle')
                $('body').removeClass('modal-open')
                $('.modal-backdrop').remove()
                getPertanyaan()
            }
        })
    })
}