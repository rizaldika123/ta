@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>Tambah Bunga</div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('bunga.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label>Nominal</label>
                                <input class="form-control" type="number" placeholder="Nominal" name="nominal" required autofocus/>
                            </div>
                            <button class="btn btn-success" type="submit">Add</button>
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
