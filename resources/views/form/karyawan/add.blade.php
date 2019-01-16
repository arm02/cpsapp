@extends('layouts.admin')
@section('title')
Tambah Karyawan
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <hr>
      <form action="{{url('form/karyawan/save')}}" method="POST" enctype="multipart/form-data">
       <label for="judul">Nama</label>
        <input type="text" class="form-control" name="nama" id="inputEmail4" placeholder="Nama">
          <label for="judul">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="inputEmail4"  placeholder="Alamat">
          <label for="judul">No Telepon</label>
        <input type="text" class="form-control" name="telpon" id="inputEmail4"  placeholder="Nomor Telpon">          
          <label for="judul">Tanggal Masuk</label>
        <input type="date" class="form-control" name="tanggalmasuk" id="inputEmail4">
          <label for="judul">Gaji Pokok</label>
        <input type="number" class="form-control" name="gajipokok" id="inputEmail4"  placeholder="Gaji Pokok">
          <label for="judul">Tunjangan</label>
        <input type="number" class="form-control" name="tunjangan" id="inputEmail4" placeholder="Tunjangan">
          <label for="judul">Status</label>
        <input type="text" class="form-control" name="status" id="inputEmail4" placeholder="Status">
          <label for="judul">Keterangan</label>
        <textarea class="form-control" name="keterangan" id="inputEmail4" placeholder="Keterangan"></textarea>
          <label for="judul">Rincian</label>
        <textarea class="form-control" name="rincian" id="inputEmail4" placeholder="Rincian"></textarea> 
  <br>
  <hr>
  <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-plus-circle"></i></button>
  @csrf
</form>
    </div>
  </div>
</div>
@endsection