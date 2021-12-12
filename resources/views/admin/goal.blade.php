@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Goal</h3>
                <div class="right">
                    <button type="button" class="btn-add" data-toggle="modal" data-target="#addGoal"><i class="fas fa-plus"></i>&nbsp; Tambah Goal</button>
                </div>
            </div>
            <div class="panel-body no-padding">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Key</th>
                            <th>Jurusan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <td class="table-loading"><p>#</p></td>
                            <td class="table-loading"><p>#</p></td>
                            <td class="table-loading"><p>#</p></td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel" id="detail-goal">
            <div class="panel-body">
                <h4 class="data-empty"><i>TIDAK ADA DATA GOAL YANG DIPILIH</i></h4>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addGoal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Goal</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>JURUSAN :</h5>
                            <input type="text" class="form-control" id="addJurusan" value="">
                        </div>
                        <div class="col-md-8">
                            <h5>DESKRIPSI :</h5>
                            <textarea class="form-control" id="addDeskripsi" placeholder="textarea" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <h3 class="panel-title" style="margin-bottom: 1.5rem">Relasi Pertanyaan</h3>
                    @foreach ($premis as $p)
                        <label class="fancy-checkbox" style="width: max-content">
                            <input type="checkbox" name="addPremis" value="{{ $p->id }}">
                            <span>{{ $p->pertanyaan }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-add-goal">Tambah</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    getGoal()
</script>
@endsection
