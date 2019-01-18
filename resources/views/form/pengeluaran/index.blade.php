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
                 <a href="{{url('form/pengeluaran/delete/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> </a>
                <a href="{{url('form/pengeluaran/pdfid1/'.$q->id)}}" class="btn btn-sm btn-outline-success">PDF</a>
                <a href="{{url('form/pengeluaran/downloadExcelid1/'.$q->id)}}" class="btn btn-sm btn-outline-success">EXCEL</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        <hr>

        <div class="row">
          <a href="{{url('form/pengeluaran/add')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-square"></i></a>


         
            <a href="{{ url('/form/pengeluaran/pdf1')}}"><button class="btn btn-outline-primary" style="margin-left: 5px">Download PDF</button></a>
              
            <a href="{{ url('/form/pengeluaran/downloadExcel1/xlsx') }}"><button class="btn btn-outline-primary" style="margin-left: 5px">Download Excel</button></a>
            <form action="{{ URL('form/pengeluaran/importExcel1') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
              @csrf
              <input type="file" name="LaporanPengeluaran" style="margin-left: 380px"/>
              <button class="btn btn-outline-success">Import Excel</button>
            </form>

            </div>
          </div>
      </div>
    </div>
@endsection