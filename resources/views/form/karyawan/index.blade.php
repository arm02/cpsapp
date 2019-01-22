@extends('layouts.admin')
@section('title')
Karyawan
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
              <th>Nama</th>
              <th>Alamat</th>
              <th>No Telepon</th>
              <th>Tanggal Masuk</th>
              <th>Gaji Pokok</th>
              <th>Tunjangan</th>
              <th>Status</th>
              <th>Keterangan</th>
              <th>Rincian</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody> 
          <?php
              $i= 1;
              $k = \App\Karyawan::all();
              ?>
              @foreach($k as $q)
            <tr>
              <th scope="row">{{$i++}}</th>
              <td>{{$q->nama}}</td>
              <td>{{$q->alamat}}</td>
              <td>{{$q->telpon}}</td>
              <td>{{$q->tanggalmasuk}}</td>
              <td>{{$q->gajipokok}}</td>
              <td>{{$q->tunjangan}}</td>
              <td>{{$q->status}}</td>
              <td>{{$q->keterangan}}</td>
              <td>{{$q->rincian}}</td>
              <td>
                <a href="{{url('form/karyawan/edit/'.$q->id)}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i>
                </a>
                 <a href="{{url('form/karyawan/delete/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" 
                 class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>
                 </a>
                 <a href="{{url('form/karyawan/pdfid/'.$q->id)}}" class="btn btn-sm btn-outline-success">PDF</a>
                <a href="{{url('form/karyawan/downloadExcelid/'.$q->id)}}" class="btn btn-sm btn-outline-success">EXCEL</a>
              </td>
            </tr>
            @endforeach               
          </tbody>
        </table>
        </div>
        <hr>
<<<<<<< HEAD
          <a href="{{url('form/karyawan/add')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-square"></i></a>
           <div style="float:right; ">
            <a href="{{ url('form/karyawan/pdf')}}">
              <button class="btn btn-outline-primary">Download PDF</button></a>
              
            <a href="{{ url('form/karyawan/downloadExcel/xlsx') }}"><button class="btn btn-outline-primary">Download Excel</button></a>
            <form style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL('form/karyawan/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
=======
        <div class="">
          <label>   </label>
        </div>


<div class="row">
            <a href="{{url('form/karyawan/add')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-square"></i></a>
            <a href="{{ url('form/karyawan/pdf')}}"><button class="btn btn-outline-primary" style="margin-left: 5px">Download PDF</button></a>              
            <a href="{{ url('form/karyawan/downloadExcel/xlsx') }}"><button class="btn btn-outline-primary" style="margin-left: 5px">Download Excel</button></a>

            <form action="{{ URL('form/karyawan/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
>>>>>>> 920263c42d66f9bd6e93d5e876de8df76f4e3dec
              @csrf

           


              <input type="file" name="Karyawan"  style="margin-left: 380px"/>
              <button class="btn btn-outline-success">Import Excel</button>
            </form>




              </div>
          </div>
<<<<<<< HEAD
          <br>
          <div style="float: left;">
            <form style="border: 2px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ url('form/pemasukan/deleteallPM') }}" class="form-horizontal" method="get">
              @csrf
              <label>Silahkan masukan nama karyawan yang ingin dihapus</label>
              <input type="text" name="nama">
              <button type="submit" class="btn btn-outline-danger fas fa-trash-alt"></button>
            </form>
          </div>
=======
>>>>>>> 920263c42d66f9bd6e93d5e876de8df76f4e3dec
      </div>
    </div>
@endsection