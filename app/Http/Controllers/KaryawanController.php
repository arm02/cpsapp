<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Karyawan;
use Illuminate\Support\Facades\Response;
use DB;
use Excel;
use App\Test;
use Illuminate\Support\Facades\View;    
use PDF;
use Expection;

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
     public function downloadExcelid($id)
    {
        $data = Karyawan::all()->where('id',$id);
        return Excel::create('LaporanKaryawan', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }
    public function pdf()
    {

    $pen = Karyawan::all();
      $pdf = PDF::loadView('form.karyawan.pdf');
      return $pdf->download('LaporanKaryawan.pdf');
    }
    public function pdfid($id)
    {
        $q = Karyawan::find($id);
        $pdf = PDF::loadView('form.karyawan.pdfid',compact('q'));
        return $pdf->download('LaporanKaryawanPerID.pdf');
    }
    public function downloadExcel($type)
    {
        $data = Karyawan::all();
            
        return Excel::create('LaporanKaryawan', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
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
        if (Auth::user()->role == 1) {
            return redirect(url('form/karyawan'));
        }
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
        if (Auth::user()->role == 1) {
            return redirect(url('form/karyawan'));
        }
    	return redirect(url('form/karyawan'));
    }

    public function delete($id)
    {
    	$k =  Karyawan::find($id);
    	$k->delete();
        if (Auth::user()->role == 1) {
            return redirect(url('form/karyawan'));
        }
    	return redirect(url('form/karyawan'));
    }
}
