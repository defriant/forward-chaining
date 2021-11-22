<div class="panel-heading">
    <h3 class="panel-title">Detail Pertanyaan</h3>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-8">
            <h5 style="margin: 0 0 1rem 0">KEY : {{ $pertanyaan->id }} &nbsp; | &nbsp; DIBUAT PADA :
                {{ date('d M Y', strtotime($pertanyaan->created_at)) }}</h5>
            <h5>PERTANYAAN :</h5>
            <input type="hidden" name="idPertanyaan" id="idPertanyaan" value="{{ $pertanyaan->id }}">
            <input type="text" class="form-control" name="pertanyaan" id="pertanyaan"
                value="{{ $pertanyaan->pertanyaan }}">
        </div>
    </div>
</div>
<div class="panel-heading">
    <h3 class="panel-title">Relasi Goal</h3>
</div>
<div class="panel-body">
    @foreach ($goal as $g)
        @if ($g->rule->where('id_premis', $pertanyaan->id)->first() !== null)
            <label class="fancy-checkbox" style="width: max-content">
                <input type="checkbox" name="goal" value="{{ $g->id }}" checked>
                <span>{{ $g->jurusan }}</span>
            </label>
        @else
            <label class="fancy-checkbox" style="width: max-content">
                <input type="checkbox" name="goal" value="{{ $g->id }}">
                <span>{{ $g->jurusan }}</span>
            </label>
        @endif
    @endforeach
</div>
<div class="panel-footer text-center">
    <button type="button" class="btn btn-primary btn-sm" id="pertanyaan-save"><i class="fas fa-save"></i>&nbsp; Simpan
        Perubahan</button>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePertanyaan"><i class="far fa-trash-alt"></i>&nbsp; Hapus Pertanyaan</button>
</div>

<div class="modal fade" id="deletePertanyaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center" style="margin-top: 3rem">Hapus Pertanyaan {{ $pertanyaan->id }} ?</h4>
                <div style="margin-top: 5rem; text-align: center">
                    <button type="button" class="btn btn-danger" id="btn-delete-pertanyaan" data-id="{{ $pertanyaan->id }}">Hapus</button>
                    <button type="button" class="btn btn-default" id="btn-delete-pertanyaan-close" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
