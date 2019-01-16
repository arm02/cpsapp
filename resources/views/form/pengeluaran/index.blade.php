@extends('layouts.app')
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
              <th>Jumlah Pengeluaran</th>
              <th>Tanggal</th>
              <th>Rincian</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i= 1;
              $l = \App\LaporanKeuangan::all()->where('tipe',2);
              ?>
              @foreach($l as $q)
            <tr>
              <th scope="row">{{$i++}}</th>
              <td>{{$q->judul}}</td>
              <td>{{$q->jumlah}}</td>
              <td>{{$q->tanggal}}</td>
              <td>{!!$q->rincian!!}</td>
              <td>
                <a href="{{url('form/pengeluaran/edit/'.$q->id)}}" class="btn btn-outline-warning btn-sm">
                  <i class="fa fa-edit"></i>
                </a>
                 <a href="{{url('form/pengeluaran/delete/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" 
                 class="btn btn-outline-danger btn-sm">
                   <i class="fa fa-trash"></i>
                 </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        <hr>
          <a href="{{url('form/pengeluaran/add')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-square"></i>Add</a>
          <a href="{{ url('/form/pengeluaran/pdf')}}">
              <button class="btn btn-success">Download PDF</button></a>
              
            <a href="{{ url('/form/pengeluaran/downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel</button></a>
      </div>
    </div>
@endsection