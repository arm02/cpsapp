@extends('layouts.app')
@section('title')
Cek Absensi
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col md-8">
          <div class="table-responsive">
          <table class="table" id="example">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Jam Masuk</th>
              <th>Gambar</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>#</td>
              <td>#</td>
              <td>#</td>
              <td>#</td>
              <td>
                 <a href="#" onclick="return confirm('anda yakin untuk menghapusnya ?')" 
                 class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i>Hapus</a>
              </td>
            </tr>

          </tbody>
        </table>
        </div>
        <hr>
      </div>
    </div>
@endsection