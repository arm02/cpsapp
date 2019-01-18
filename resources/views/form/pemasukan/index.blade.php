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
                <a href="{{url('form/pemasukan/edit/'.$q->id)}}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i>                
                </a>
                 <a href="{{url('form/pemasukan/delete/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" 
                 class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i>
                 </a>
                 <a href="{{url('form/pemasukan/pdfid/'.$q->id)}}" class="btn btn-outline-success btn-sm">PDF</a>
                 <a href="{{url('form/pemasukan/downloadExcelid/'.$q->id)}}" class="btn btn-outline-success btn-sm">EXCEL</a>
              </td>
            </tr>
            @endforeach               
          </tbody>
        </table>
        </div>
        <hr>
        <div class="">
          <label>   </label>
        </div>

        <div class="row">
          <a href="{{url('/form/pemasukan/add')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-square"></i></a>

          
            <a href="{{ url('/form/pemasukan/pdf')}}">
              <button class="btn btn-outline-primary" style="margin-left: 5px">Download PDF</button></a>
              
            <a href="{{ url('/form/pemasukan/downloadExcel/xlsx') }}"><button class="btn btn-outline-primary" style="margin-left: 5px">Download Excel</button></a>


            <form  action="{{ URL('form/pemasukan/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
              @csrf



              <input type="file" name="LaporanPemasukan" style="margin-left: 380px" />
              <button class="btn btn-outline-success">Import Excel</button>
            </form>

          </div>
          </div>
      </div>
    </div>
@endsection