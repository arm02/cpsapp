@extends('layouts.admin')
@section('title')
Pemasukan
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
              <th>Judul</th>
              <th>Jumlah Pemasukan</th>
              <th>Tanggal</th>
              <th>Rincian</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody> 
          <?php
              $i= 1;
              $l = \App\LaporanKeuangan::all()->where('tipe',1);
              ?>
              @foreach($l as $q)
            <tr>
              <th scope="row">{{$i++}}</th>
              <td>{{$q->judul}}</td>
              <td>{{$q->jumlah}}</td>
              <td>{{$q->tanggal}}</td>
              <td>{!!$q->rincian!!}</td>
              <td>
                @if(Auth::user()->role == 1)
                <a href="{{url('admin/form/pemasukan/edit/'.$q->id)}}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i>       
                </a>
                 <a href="{{url('admin/form/pemasukan/delete/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" 
                 class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i>
                 </a>
                 @elseif(Auth::user()->role == 3)
                 <a href="{{url('/form/pemasukan/edit/'.$q->id)}}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i>       
                </a>
                 <a href="{{url('/form/pemasukan/delete/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" 
                 class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i>
                 </a>
                 @endif
              </td>
            </tr>
            @endforeach               
          </tbody>
        </table>
        </div>
        <hr>
        @if(Auth::user()->role == 1)
          <a href="{{url('admin/form/pemasukan/add')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-square"></i></a>
        @elseif(Auth::user()->role ==3)
          <a href="{{url('/form/pemasukan/add')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-square"></i></a>
        @endif
            @if(Auth::user()->role == 1)
          <div style="float:right; ">
            <a href="{{ url('admin/form/pemasukan/pdf')}}">
              <button class="btn btn-outline-primary">Download PDF</button></a>
              
            <a href="{{ url('/form/pemasukan/downloadExcel/xlsx') }}"><button class="btn btn-outline-primary">Download Excel</button></a>
          </div>
            @elseif(Auth::user()->role == 3)
            <div style="float:right; ">
            <a href="{{ url('admin/form/pemasukan/pdf')}}">
              <button class="btn btn-outline-primary">Download PDF</button></a>
              
            <a href="{{ url('/form/pemasukan/downloadExcel/xlsx') }}"><button class="btn btn-outline-primary">Download Excel</button></a>
          </div>
          @endif
      </div>
    </div>
@endsection