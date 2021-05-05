@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i>Tempo
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
              <a href="{{ route('tempo.create') }}" class="btn btn-primary m-2">Tambah Tempo</a>
            </div>
            <br>
            <table class="table table-responsive-sm table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Tempo</th>
                  <th width="150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tempos as $tempo)
                <tr>
                  <td><strong>{{ $tempo->id }}</strong></td>
                  <td><strong>{{ $tempo->bulan }} bulan</strong></td>
                  <td>
                    <a href="{{ url('/tempo/' . $tempo->id . '/edit') }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('tempo.destroy', $tempo->id ) }}" method="POST" class="d-inline">
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