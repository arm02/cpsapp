@extends('layouts.admin')
@section('title')
Visi & Misi
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col md-8">
          <div class="table-responsive">
          <table class="table" id="example">
          <thead>
            <tr>
              <th>No</th>
              <th>Visi</th>
              <th>Misi</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody> 
          <?php
              $i= 1;
              $v = \App\VisiMisi::all();
              ?>
              @foreach($v as $q)
            <tr>
              <th scope="row">{{$i++}}</th>
              <td>{!!$q->visi!!}</td>
              <td>{!!$q->misi!!}</td>
              <td>
                <a href="{{url('admin/form/visimisi/edit/'.$q->id)}}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></a>
              </td>
            </tr>
            @endforeach               
          </tbody>
        </table>
        </div>
        <hr>
      </div>
    </div>
@endsection