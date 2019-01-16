<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

class KaryawanController extends Controller
{	
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	return view('form.karyawan.index');
    }

    public function add()
    {
    	return view('form.karyawan.add');
    }

    public function save(Request $r)
    {
    	$k = new Karyawan;
    	$k->nama = $r->input('nama');
    	$k->alamat = $r->input('alamat');
    	$k->telpon = $r->input('telpon');
    	$k->tanggalmasuk = $r->input('tanggalmasuk');
    	$k->gajipokok = $r->input('gajipokok');
    	$k->tunjangan = $r->input('tunjangan');
    	$k->status = $r->input('status');
    	$k->keterangan = $r->input('keterangan');
    	$k->rincian = $r->input('rincian');
    	$k->save();
    	return redirect(url('form/karyawan'));	
    }

    public function edit($id)
    {	
    	$k = Karyawan::find($id);
    	return view('form.karyawan.edit')->with('k', $k);    
    }

    public function update(Request $r)
    {
    	$k = Karyawan::find($r->input('id'));
    	$k->nama = $r->input('nama');
    	$k->alamat = $r->input('alamat');
    	$k->telpon = $r->input('telpon');
    	$k->tanggalmasuk = $r->input('tanggalmasuk');
    	$k->gajipokok = $r->input('gajipokok');
    	$k->tunjangan = $r->input('tunjangan');
    	$k->status = $r->input('status');
    	$k->keterangan = $r->input('keterangan');
    	$k->rincian = $r->input('rincian');
    	$k->save();
    	return redirect(url('form/karyawan'));
    }

    public function delete($id)
    {
    	$k =  Karyawan::find($id);
    	$k->delete();
    	return redirect(url('form/karyawan'));
    }
}
