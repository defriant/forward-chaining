@extends('layouts.user')
@section('content')
<section class="row main">
    <div class="col-lg-8 offset-lg-2 main-content">
        <hr class="field-hr">
        <h2 class="field-title">IDENTITAS</h2>
        <div class="field-box">
            <div class="field-box-content">
                <form method="POST" action="/analisa">
                    {{ csrf_field() }}
                    <div class="inputs">
                        <i class="far fa-user"></i>
                        <input type="text" name="nama" class="input-field" placeholder="Nama lengkap" required>
                    </div>
                    <div class="inputs">
                        <i class="far fa-envelope"></i>
                        <input type="email" name="email" class="input-field" placeholder="Alamat Email" required>
                    </div>
                    <button type="submit" class="btn-next">Lanjut <i class="far fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection