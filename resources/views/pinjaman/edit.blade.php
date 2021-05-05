@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>Edit pinjaman</div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('pinjaman.update',$pinjam->id) }}">
                            @csrf
                            <div class="form-group row">
                                <label>tanggal pengajuan</label>
                                <input class="form-control" value="{{ $pinjam->tanggal_pengajuan }}" type="text" placeholder="Name" name="name" required autofocus/>
                            </div><div class="form-group row">
                                <label>Name</label>
                                <input class="form-control" value="{{ $pinjam->nama }}" type="text" placeholder="Name" name="name" required autofocus/>
                            </div><div class="form-group row">
                                <label>Name</label>
                                <input class="form-control" value="{{ $pinjam->nama }}" type="text" placeholder="Name" name="name" required autofocus/>
                            </div><div class="form-group row">
                                <label>Name</label>
                                <input class="form-control" value="{{ $pinjam->nama }}" type="text" placeholder="Name" name="name" required autofocus/>
                            </div><div class="form-group row">
                                <label>Name</label>
                                <input class="form-control" value="{{ $pinjam->nama }}" type="text" placeholder="Name" name="name" required autofocus/>
                            </div>
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-primary">Return</a> 
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
