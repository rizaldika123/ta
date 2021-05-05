@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i>Tambah Pinjaman
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('pinjaman.store') }}">
              @csrf
              <div class="form-group row">
                <label for="nasabahInput">Nasabah</label>
                <select class="form-control" id="nasabahInput" name="nasabahInput">
                  @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group row">
                <label>Nominal</label>
                <input class="form-control" type="number" placeholder="Nominal" name="nominal" required autofocus />
              </div>
              <div class="form-group row">
                <label for="tempo">Tempo</label>
                <select class="form-control" id="tempoInput" name="tempoId">
                  @foreach ($tempos as $tempo)
                  <option value="{{ $tempo->id }}">{{ $tempo->bulan }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group row">
                <label for="bungainput">Bunga</label>
                <div class="input-group">
                  <select class="form-control" id="bungainput" name="bungaId">
                    @foreach($bungas as $bunga)
                    <option value="{{ $bunga->id }}">{{ $bunga->nominal }}</option>
                    @endforeach
                  </select>
                  <span class="input-group-text">%</span>
                </div>
              </div>
              <div class="form-group row">
                <label for="kategoriInput">Kategori</label>
                <select class="form-control" id="kategoriInput" name="kategoriId">
                  @foreach($kategoris as $kategori)
                  <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group row">
                <label for="biayaAdministrasiInput">BiayaAdministrasi</label>
                <select class="form-control" id="biayaAdministrasiInput" name="biayaAdministrasiId">
                  @foreach ($biayaAdministrasis as $biayaAdministrasi)
                  <option value="{{ $biayaAdministrasi->id }}">{{ $biayaAdministrasi->nominal }}</option>
                  @endforeach
                </select>
              </div>
              <button class="btn btn-success" type="submit">Add</button>
              <a href="{{ route('pinjaman.index') }}" class="btn btn-primary">Return</a>
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