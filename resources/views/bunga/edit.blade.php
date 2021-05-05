@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>Edit bunga</div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('bunga.update',$bung->id) }}">
                            @csrf
                            <div class="form-group row">
                                <label>nominal</label>
                                <input class="form-control" value="{{ $bung->nominal }}" type="text" placeholder="Name" name="nominal" required autofocus/>
                            </div>
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="{{ route('bunga.index') }}" class="btn btn-primary">Return</a> 
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
