<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function saldo()
    {	
    	$saldo = Saldo::where('id',1)->first();
    	return view('form.pemasukan.add', compact('saldo'));
    }

    public function all()
    {
    	return view('form.saldo.index');
    }
}
