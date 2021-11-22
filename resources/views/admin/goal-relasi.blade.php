<div class="panel-heading">
    <h3 class="panel-title">Detail Goal</h3>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-8">
            <h5 style="margin: 0 0 1rem 0">KEY : {{ $goal->id }} &nbsp; | &nbsp; DIBUAT PADA : {{ date('d M Y', strtotime($goal->created_at)) }}</h5>
            <h5>JURUSAN :</h5>
            <input type="hidden" name="idGoal" id="idGoal" value="{{ $goal->id }}">
            <input type="text" class="form-control" id="jurusan" value="{{ $goal->jurusan }}">
        </div>
    </div>
</div>
<div class="panel-heading">
    <h3 class="panel-title">Relasi Pertanyaan</h3>
</div>
<div class="panel-body">
    @foreach ($premis as $p)
        @if ($p->rule->where('id_goal', $goal->id)->first() !== null)
            <label class="fancy-checkbox" style="width: max-content">
                <input type="checkbox" name="premis" value="{{ $p->id }}" checked>
                <span>{{ $p->pertanyaan }}</span>
            </label>
        @else
            <label class="fancy-checkbox" style="width: max-content">
                <input type="checkbox" name="premis" value="{{ $p->id }}">
                <span>{{ $p->pertanyaan }}</span>
            </label>
        @endif
    @endforeach
</div>
<div class="panel-footer text-center">
    <button type="button" class="btn btn-primary btn-sm" id="goal-save"><i class="fas fa-save"></i>&nbsp; Simpan Perubahan</button>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteGoal"><i class="far fa-trash-alt"></i>&nbsp; Hapus Goal</button>
</div>

<div class="modal fade" id="deleteGoal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center" style="margin-top: 3rem">Hapus Goal {{ $goal->id }} ?</h4>
                <div style="margin-top: 5rem; text-align: center">
                    <button type="button" class="btn btn-danger" id="btn-delete-goal" data-id="{{ $goal->id }}">Hapus</button>
                    <button type="button" class="btn btn-default" id="btn-delete-goal-close" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>