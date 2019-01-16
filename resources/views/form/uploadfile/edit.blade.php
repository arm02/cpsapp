@extends('layouts.admin')
@section('title')
Edit Upload
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <hr>
      <form action="{{ url ('form/uploadfile/update')}}" method="POST" enctype="multipart/form-data">
          <label for="judul">Nama</label>
        <input type="text" class="form-control" name="nama" id="inputEmail4" value="{{ $l->nama }}" placeholder="Nama">
          <label for="judul">File</label>
        <input type="file" class="form-control" name="file" id="inputEmail4" value="{{ $l->file }}">
          @csrf
          <br>
          <input type="hidden" name="id" value="{{$l->id}}">
          <button class="btn btn-outline-success float-right" type="submit">Update Data</button>
        </form>
      </form>

      </div>
    </div>
  </div>
@endsection