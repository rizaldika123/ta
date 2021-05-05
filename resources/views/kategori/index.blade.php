@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i>Kategori
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
              <a href="{{ route('kategori.create') }}" class="btn btn-primary m-2">Add kategori</a>
            </div>
            <br>
            <table class="table table-responsive-sm table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th width="150px">aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($kategoris as $kat)
                <tr>
                  <td><strong>{{ $kat->nama }}</strong></td>
                  <td>
                    <a href="{{ url('/kategori/' . $kat->id . '/edit') }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('kategori.destroy', $kat->id ) }}" method="POST" class="d-inline">
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