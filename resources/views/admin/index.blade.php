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
                        <form method="POST" action="{{url('tambah_saldo')}}">
                            @csrf
                            <div>
                            <input type="hidden" name="tambah_saldo" value="{{$saldo->saldo}}">
                            <label>Tambah Saldo</label>
                            <input type="text" name="jumlah" placeholder="Masukkan Jumlah Saldo">
                            <button class="btn btn-outline-primary btn-lg" title="Tambah Saldo"><i class="fas fa-hand-holding-usd"></i></button>
                            </div>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection