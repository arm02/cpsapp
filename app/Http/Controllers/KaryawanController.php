<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Karyawan;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use DB;
use Excel;
use App\Test;
use Illuminate\Support\Facades\View;    
use PDF;
use Expection;
use Carbon\Carbon;

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
        $date = \Carbon\Carbon::now()->format('d F Y');
        $data = Karyawan::all()->where('id',$id);
        return Excel::create('LaporanKaryawanPerID_'.$date, function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }
    public function pdf()
    {
        $date = \Carbon\Carbon::now()->format('d F Y');
    $pen = Karyawan::all();
      $pdf = PDF::loadView('form.karyawan.pdf');
      return $pdf->download('LaporanKaryawan_'.$date.'.pdf');
    }
    public function pdfid($id)
    {
        $date = \Carbon\Carbon::now()->format('d F Y');
        $q = Karyawan::find($id);
        $pdf = PDF::loadView('form.karyawan.pdfid',compact('q'));
        return $pdf->download('LaporanKaryawanPerID_'.$date.'.pdf');
    }
    public function downloadExcel($type)
    {
        $data = Karyawan::all();
            $date = \Carbon\Carbon::now()->format('d F Y');
        return Excel::create('LaporanKaryawan_'.$date, function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel()
    {
        if(Input::hasFile('Karyawan')){
            $path = Input::file('Karyawan')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['nama' => $value->nama, 'alamat' => $value->alamat, 'telpon' => $value->telpon, 'tanggalmasuk' => $value->tanggalmasuk, 'gajipokok' => $value->gajipokok, 'tunjangan' => $value->tunjangan, 'status' => $value->status, 'keterangan' => $value->keterangan, 'rincian' => $value->rincian];
                }
                if(!empty($insert)){
                    DB::table('karyawans')->insert($insert);
                }
            }
        }
        return back();
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
