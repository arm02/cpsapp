@extends('layouts.admin')
@section('title')
Admin Dasboard
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <center>
                        <h2>Welcome , {{Auth::user()->name}}</h2>
                        <hr>
                        <h6>Silahkan pilih menu di navbar</h6>
                        <hr>
                        <?php
                        $saldo = \App\Saldo::where('id',1)->first();
                        ?>
                        <h2><i class="far fa-money-bill-alt"></i> Saldo Anda : {{$saldo->saldo}}</h2>
                        <form method="POST" action="{{url('tambah_saldo')}}"><br><br>
                            @csrf

                            
                                <input type="hidden" name="tambah_saldo" value="{{$saldo->saldo}}">
                                <label for="formGroupExampleInput">Tambah Saldo</label>
                                <div class="container col-md-7 row" style="width: 1000px;">
                                <input type="text" class="form-control" name="jumlah" id="formGroupExampleInput" 
                                placeholder="Masukan Jumlah Saldo" required style="width: 40000px;">
                                </div><br>
                            
                            <button class="btn btn-outline-primary float-center" title="Tambah Saldo" type="submit">Tambah Saldo</button>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection