@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Goal</h3>
                <div class="right">
                    <button type="button" class="btn-add" data-toggle="modal" data-target="#addPertanyaan"><i class="fas fa-plus"></i>&nbsp; Tambah Pertanyaan</button>
                </div>
            </div>
            <div class="panel-body no-padding">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Key</th>
                            <th>Pertanyaan</th>
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
        <div class="panel" id="detail-pertanyaan">
            <div class="panel-body">
                <h4 class="data-empty"><i>TIDAK ADA DATA PERTANYAAN YANG DIPILIH</i></h4>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addPertanyaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Pertanyaan</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Pertanyaan :</h5>
                            <input type="text" class="form-control" id="addPremis" value="">
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <h3 class="panel-title" style="margin-bottom: 1.5rem">Relasi Goal</h3>
                    @foreach ($goal as $g)
                        <label class="fancy-checkbox" style="width: max-content">
                            <input type="checkbox" name="addGoal" value="{{ $g->id }}">
                            <span>{{ $g->jurusan }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-add-pertanyaan">Tambah</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        getPertanyaan()
    </script>
@endsection