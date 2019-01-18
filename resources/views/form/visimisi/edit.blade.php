@extends('layouts.admin')
@section('title')
Ubah Visi & Misi
@endsection
@section('content')
<div class="container">
  <form action="{{url('form/visimisi/update')}}" method="POST" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-md-6">
          <label for="judul"><u>Visi</u></label>
        <textarea class="form-control" name="visi" id="ckeditor" placeholder="Visi">{{$v->visi}}</textarea>
        </div>
        <div class="col-md-6"> 
          <label for="judul"><u>Misi</u></label>
        <textarea class="form-control" name="misi" id="ckeditor2" placeholder="Misi">{{$v->misi}}</textarea>
        </div>
          @csrf
        </div>
        <br>
          <div class="right" style="float: right;">
          <input type="hidden" name="id" value="{{$v->id}}">
        <button class="btn btn-outline-success float-right" type="submit">Update Data</button>
        </div>
    </form>
  </div>
@endsection