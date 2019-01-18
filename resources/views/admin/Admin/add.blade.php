@extends('layouts.admin')
@section('title')
Add Admin
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Tambah Admin</div>
        <div class="card-body">
         <form action="{{url('dataadmin/save')}}" method="POST">
          <div class="form-group">
            <label for="formGroupExampleInput">Username</label>
            <input type="text" class="form-control" name="name" id="formGroupExampleInput" 
            placeholder="Username" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Email</label>
            <input type="text" class="form-control" name="email" id="formGroupExampleInput" 
            placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Password</label>
            <input type="password" class="form-control" name="password" id="formGroupExampleInput" 
            placeholder="Password" required>
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Status</label>
            <input type="text" class="form-control" name="status" id="formGroupExampleInput" 
            placeholder="Status" readonly="true" value="1" required>
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Role</label>
            <select class="form-control" name="role" required>
              <option value="1">Admin</option>
            </select>
          </div>
          @csrf
          <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-plus-circle"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection