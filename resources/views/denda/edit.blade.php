@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i>Edit denda
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('denda.update',$dendas->id) }}">
              @csrf
              <div class="form-group row">
                <label>nominal</label>
                <input class="form-control" value="{{ $dendas->nominal }}" type="text" placeholder="nominal" name="nominal" required autofocus />
              </div>
              <button class="btn btn-success" type="submit">Simpan</button>
              <a href="{{ route('denda.index') }}" class="btn btn-primary">Return</a>
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