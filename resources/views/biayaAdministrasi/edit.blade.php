@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i>Edit Biaya Administrasi
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('biayaAdministrasi.update',$biayaAdmin->id) }}">
              @csrf
              <div class="form-group row">
                <label>nominal</label>
                <input class="form-control" value="{{ $biayaAdmin->nominal }}" type="number" placeholder="Nominal" name="nominal" required autofocus />
              </div>
              <button class="btn btn-success" type="submit">Simpan</button>
              <a href="{{ route('biayaAdministrasi.index') }}" class="btn btn-primary">Return</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('javascript')

@endsection