@extends('layouts.admin')
@section('title')
Admin Dasboard
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <center>
                <div class="card-header">Admin Dashboard</div>
                </center>
                <div class="card-body">
                    <center>
                        <h2>Welcome , {{Auth::user()->name}}</h2>
                        <hr>
                        <h6>Silahkan Pilih Menu Di Navbar</h6>
                        <hr>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
