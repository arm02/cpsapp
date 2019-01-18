<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Saldo;
class SaldoController extends Controller
{
    public function saldo(Request $r)
    {	
    	$saldo = Saldo::where('id',1)->first();
    	return view('form.pemasukan.add', compact('saldo'));
    }

    public function all()
    {
    	return view('form.saldo.index');
    }

    public function tambah_saldo(Request $r)
    {
    	$jumlah = $r->tambah_saldo;
    	$saldo = Saldo::find(1);
    	$saldo->saldo = $jumlah + 10000;
    	$saldo->save();

    	return redirect(url('admin'));
    }
}
