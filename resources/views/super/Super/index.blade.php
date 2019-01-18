@extends('layouts.admin')
@section('title')
Admin
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Admin</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="example">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Role</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i= 1;
                $user = \App\User::all()->where('role', '3');
                ?>
                @foreach($user as $q)
                <tr>
                  
                  <th scope="row">{{$i++}}</th>
                  <input type="hidden" name="id" value="{{$q->id}}">
                  <td>{{$q->name}}</td>
                  <td>@if($q->status==1)<a class="btn btn-info btn-sm" style="color: white;">Aktif</a> 
                    @elseif($q->status==2)<a class="btn btn-warning btn-sm" style="color: white;">Tidak Aktif</a> 
                  @endif</td>
                  <td>@if($q->role==1)<a class="btn btn-info btn-sm" style="color: white;">Admin</a> 
                    @elseif($q->role==3)<a class="btn btn-success btn-sm" style="color: white;">SuperVisor</a> 
                  @endif</td>
                  <td>
                  @if($q->status != 1)
                   <a href="{{url('datasuper/updatesuper/'.$q->id)}}" class="btn btn-outline-warning btn-sm">Aktifkan</a>
                   @elseif($q->status !=2)
                   <a href="{{url('datasuper/updatesuper2/'.$q->id)}}" class="btn btn-outline-warning btn-sm">NonAktifkan</a>
                   @endif
                   <a href="{{url('datasuper/delete/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" 
                     class="btn btn-outline-danger btn-sm">Delete</a>
                   </tr>
                   @endforeach
                 </tbody>
               </table>
             </div>
             <hr>
            <li class="list-group-item float-left">
              <a href="{{url('datasuper/add')}}" class="btn btn-primary fas fa-plus-circle"></a>
            </li>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection