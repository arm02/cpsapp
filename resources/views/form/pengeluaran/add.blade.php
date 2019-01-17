@extends('layouts.admin')
@section('title')
Add Pengeluaran
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <hr>
      <form action="{{url('form/pengeluaran/save')}}" method="POST" enctype="multipart/form-data">
        
      <label>Judul</label>
                <?php
                $saldo = \App\Saldo::where('id',1)->first();
                ?>
    <input type="hidden" name="saldo" value="{{$saldo->saldo}}">
    <input type="text" class="form-control" name="judul" id="inputEmail4" placeholder="Judul">
      <label>Jumlah Pengeluaran</label>
    <input type="text" class="form-control" name="jumlah" id="inputEmail4" placeholder="Jumlah Pemasukan">
      <label>Tanggal</label>
    <input type="date" class="form-control" name="tanggal" id="inputEmail4" placeholder="Tanggal">

     <div class="form-group col-md-25">
      <label>Rincian</label>
      <label for="ckeditor"></label>
      <textarea name="rincian" id="ckeditor"></textarea>
    </div>
  <br>
  <hr>
  <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-plus-circle"></i></button>
  @csrf
</form>
    </div>
  </div>
</div>
@endsection