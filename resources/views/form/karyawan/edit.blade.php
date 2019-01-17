@extends('layouts.admin')
@section('title')
Ubah Karyawan
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <hr>
      <form action="{{ url ('admin/form/karyawan/update')}}" method="POST" enctype="multipart/form-data">
          <label for="judul">Nama</label>
        <input type="text" class="form-control" name="nama" id="inputEmail4" value="{{ $k->nama }}" placeholder="Nama">
          <label for="judul">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="inputEmail4" value="{{ $k->alamat }}" placeholder="Alamat">
          <label for="judul">No Telepon</label>
        <input type="text" class="form-control" name="telpon" id="inputEmail4" value="{{ $k->telpon }}" placeholder="Nomor Telpon">          
          <label for="judul">Tanggal Masuk</label>
        <input type="date" class="form-control" name="tanggalmasuk" id="inputEmail4" value="{{ $k->tanggalmasuk }}">
          <label for="judul">Gaji Pokok</label>
        <input type="number" class="form-control" name="gajipokok" id="inputEmail4" value="{{ $k->gajipokok }}" placeholder="Gaji Pokok">
          <label for="judul">Tunjangan</label>
        <input type="number" class="form-control" name="tunjangan" id="inputEmail4" value="{{ $k->tunjangan }}" placeholder="Tunjangan">
          <label for="judul">Status</label>
        <input type="text" class="form-control" name="status" id="inputEmail4" value="{{ $k->status }}" placeholder="Status">
          <label for="judul">Keterangan</label>
        <textarea class="form-control" name="keterangan" id="inputEmail4"  placeholder="Keterangan">{{ $k->keterangan }}</textarea>
          <label for="judul">Rincian</label>
        <textarea class="form-control" name="rincian" id="inputEmail4" placeholder="Rincian">{{ $k->rincian }}</textarea>
          @csrf
          <br>
          <input type="hidden" name="id" value="{{$k->id}}">
          <button class="btn btn-primary float-right btn-lg" type="submit"><i class="fas fa-pen"></i></button>
        </form>
      </form>
      </div>
    </div>
  </div>
@endsection