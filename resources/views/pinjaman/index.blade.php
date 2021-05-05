@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i>Pinjaman
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
              <a href="{{ route('pinjaman.create') }}" class="btn btn-primary m-2">Tambah Pinjaman</a>
            </div>
            <br>
            <table class="table table-responsive-sm table-striped">
              <thead>
                <tr>
                  <th>Tanggal Pengajuan</th>
                  <th>Nominal Pinjaman</th>
                  <th>Kategori</th>
                  <th>Tempo</th>
                  <th>Denda</th>
                  <th>Nasabah</th>
                  <th>Admin</th>
                  <th>Staf</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pinjaman as $pinjam)
                <tr>
                  <td><strong>{{ $pinjam->tanggal_pengajuan }}</strong></td>
                  <td><strong>{{ $pinjam->nominal }}</strong></td>
                  <td><strong>{{ $pinjam->kategori->nama }}</strong></td>
                  <td><strong>{{ $pinjam->tempo->bulan }}</strong></td>
                  <td><strong>{{ $pinjam->user->name }}</strong></td>


                  <td>
                    <a href="{{ url('/pinjaman/' . $pinjam->id . '/edit') }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('pinjaman.destroy', $pinjam->id ) }}" method="POST" class="d-inline">
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