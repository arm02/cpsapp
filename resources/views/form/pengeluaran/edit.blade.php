@extends('layouts.admin')
@section('title')
Edit pengeluaran
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <hr>
      @if(Auth::user()->role == 1)
      <form action="{{ url ('admin/form/pengeluaran/update')}}" method="POST" enctype="multipart/form-data">
      @elseif(Auth::user()->role == 3)
      <form action="{{ url ('form/pengeluaran/update')}}" method="POST" enctype="multipart/form-data">
      @endif
          <label for="judul">Judul</label>
        <input type="text" class="form-control" name="judul" id="inputEmail4" value="{{$l->judul}}" placeholder="Judul">
          <label for="judul">Jumlah Pengeluaran</label>
        <input type="text" class="form-control" name="jumlah" id="inputEmail4" value="{{$l->jumlah}}" 
        placeholder="Jumlah Pengeluaran">
        <label for="judul">tanggal</label>
        <input type="date" class="form-control" name="tanggal" id="inputEmail4" value="{{$l->tanggal}}" 
        placeholder="Tanggal">

    <div class="form-group col-md-25">
      <label>Rincian</label>
      <label for="ckeditor"></label>
      <textarea name="rincian" id="ckeditor">{{$l->rincian}}</textarea>
    </div>
         
          @csrf
          <br>
          <input type="hidden" name="id" value="{{$l->id}}">
          <button class="btn btn-primary float-right btn-lg" type="submit"><i class="fas fa-pen"></i></button>
          <br>
        </form>
      </div>
    </div>
  </form>
</div></div>

@endsection