@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i>Biaya Administrasi
          </div>
          <div class="card-body">
            @if(Session::has('message'))
            <div class="row">
              <div class="col-12">
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
              </div>
            </div>
            @endif
            <div class="row">
              <a href="{{ route('biayaAdministrasi.create') }}" class="btn btn-primary m-2">Tambah Biaya Administrasi</a>
            </div>
            <br>
            <table class="table table-responsive-sm table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nominal Administrasi</th>
                  <th width="150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($biayaAdministrasi as $biayaAdmin)
                <tr>
                  <td><strong>{{ $biayaAdmin->id}}</strong></td>
                  <td><strong>{{ $biayaAdmin->nominal }}</strong></td>
                  <td>
                    <a href="{{ url('/biayaAdministrasi/' . $biayaAdmin->id . '/edit') }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('biayaAdministrasi.destroy', $biayaAdmin->id ) }}" method="POST" class="d-inline">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('javascript')

@endsection