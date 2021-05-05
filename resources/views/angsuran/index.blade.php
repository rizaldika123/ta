@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>Angsuran</div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                </div>
                            </div>
                         @endif
                        <div class="row"> 
                          <a href="{{ route('angsuran.create') }}" class="btn btn-primary m-2">Tambah Angsuran</a>
                        </div>
                        <br>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Tanggal Angsuran</th>
                            <th>Nominal Angsuran</th>
                            <th>Kategori</th>
                            <th>Tempo</th>
                            <th>Denda</th>
                            <th>Status</th>
                            <th>Nasabah</th>
                            <th>Admin</th>
                            <th>Staf</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($angsuran as $angsur)
                            <tr>
                              <td><strong>{{ $angsur->tanggal_angsuran }}</strong></td>
                              <!-- <td><strong>{{ $angsur->nominal }}</strong></td> -->
                              <td>
                                <a href="{{ url('/angsuran/' . $angsur->id . '/edit') }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('angsuran.destroy', $angsur->id ) }}" method="POST">
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
