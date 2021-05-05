@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i>Denda
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
              <a href="{{ route('denda.create') }}" class="btn btn-primary m-2">Tambah Denda</a>
            </div>
            <br>
            <table class="table table-responsive-sm table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nominal Denda</th>
                  <th width="150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($denda as $den)
                <tr>
                  <td><strong>{{ $den->id}}</strong></td>
                  <td><strong>{{ $den->nominal}}</strong></td>
                  <td>
                    <a href="{{ url('/denda/' . $den->id . '/edit') }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('denda.destroy', $den->id ) }}" method="POST" class="d-inline">
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