@extends('layouts.admin')
@section('title')
Admin Dasboard
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Supervisor Dashboard</div>

                <div class="card-body">
                    <center>
                        <h2>Welcome Supervisor, {{Auth::user()->name}}</h2>
                        <hr>
                        <h6>Silahkan pilih menu di navbar</h6>
                        <hr>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection