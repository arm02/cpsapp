@extends('layouts.admin')
@section('title')
Add Upload File
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <hr>
      <form action="{{url('form/uploadfile/save')}}" method="POST" enctype="multipart/form-data">
        
      <label>Nama</label>
    <input type="text" class="form-control" name="nama" id="inputEmail4" placeholder="Nama">
      <label>File</label>
    <input type="file" class="form-control" name="file" id="inputEmail4" placeholder="File">
  <br>
  <hr>
  <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-plus-circle"></i>Add</button>
  @csrf
</form>
    </div>
  </div>
</div>
@endsection