<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LaporanKeuangan;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use DB;
use Excel;
use App\Test;
use App\Saldo;
use Illuminate\Support\Facades\View; 
use Illuminate\Support\Facades\Auth;    
use PDF;
use Expection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Todo;


class LaporanKeuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function indexpemasukan()
    {
    	return view('form.pemasukan.index');
    }
    
    public function pdf()
    {
    $date = \Carbon\Carbon::now()->format('d F Y');
    $test = LaporanKeuangan::all();
      $pdf = PDF::loadView('form.pemasukan.pdf');
      return $pdf->download('LaporanPemasukan_'.$date.'.pdf');
    }
    public function pdf1()
    {

    $pen = LaporanKeuangan::all();
    $date = \Carbon\Carbon::now()->format('d F Y');
      $pdf = PDF::loadView('form.pengeluaran.pdf');
      return $pdf->download('LaporanPengeluaran_'.$date.'.pdf');
    }
    public function downloadExcel($type)
    {
        $data = LaporanKeuangan::all()->where('tipe',1);
            $date = \Carbon\Carbon::now()->format('d F Y');
        return Excel::create('LaporanPemasukan_'.$date, function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function pdfid($id)
    {
        $date = \Carbon\Carbon::now()->format('d F Y');
        $pdfid = LaporanKeuangan::find($id);
        $pdf = PDF::loadView('form.pemasukan.pdfid',compact('pdfid'));
        return $pdf->download('LaporanPemasukanPerID_'.$date.'.pdf');
    }
    public function pdfid1($id)
    {
        $date = \Carbon\Carbon::now()->format('d F Y');
        $pdfid = LaporanKeuangan::find($id);
        $pdf = PDF::loadView('form.pengeluaran.pdfid',compact('pdfid'));
        return $pdf->download('LaporanPemasukanPerID_'.$date.'.pdf');
    }
    public function downloadExcelid1($id)
    {
        $date = \Carbon\Carbon::now()->format('d F Y');
        $data = LaporanKeuangan::all()->where('id',$id);
        return Excel::create('LaporanPengeluaranPerID_'.$date, function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }
    public function downloadExcelid($id)
    {
        $date = \Carbon\Carbon::now()->format('d F Y');
        $data = LaporanKeuangan::all()->where('id',$id);
        return Excel::create('LaporanPemasukanPerID_'.$date, function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }

     public function downloadExcel1($type)
    {
        $data = LaporanKeuangan::all()->where('tipe',2);
        $date = \Carbon\Carbon::now()->format('d F Y');
        return Excel::create('LaporanPengeluaran_'.$date, function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel()
    {
        if(Input::hasFile('LaporanPemasukan')){
            $path = Input::file('LaporanPemasukan')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['judul' => $value->judul, 'jumlah' => $value->jumlah, 'tanggal' => $value->tanggal, 'rincian' => $value->rincian, 'tipe' => 1];
                }
                if(!empty($insert)){
                    DB::table('laporan_keuangans')->insert($insert);
                }
            }
        }
        return back();
    }

    public function importExcel1()
    {
        if(Input::hasFile('LaporanPengeluaran')){
            $path = Input::file('LaporanPengeluaran')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['judul' => $value->judul, 'jumlah' => $value->jumlah, 'tanggal' => $value->tanggal, 'rincian' => $value->rincian, 'tipe' => 2];
                }
                if(!empty($insert)){
                    DB::table('laporan_keuangans')->insert($insert);
                }
            }
        }
        return back();
    }
    
    public function addpemasukan()
    {
    	return view('form.pemasukan.add');
    }

    public function savepemasukan(Request $r)
    {
    	$l = new LaporanKeuangan;
    	$l->judul = $r->input('judul');
    	$l->jumlah = $r->input('jumlah');
    	$l->tanggal = $r->input('tanggal');
    	$l->rincian = $r->input('rincian');
    	$tipe = "1";
    	$l->tipe = $tipe;
    	$l->save();

        $uang = $r->jumlah;
        $q = $r->saldo;

        $saldo = Saldo::find(1);
        $saldo->saldo = $q + $uang;
        $saldo->save();
        if (Auth::user()->role == 1) {
            return redirect(url('form/pemasukan'));
        }
    	return redirect(url('form/pemasukan'));
    }

    public function editpemasukan($id)
    {	
    	$l = LaporanKeuangan::find($id);
    	return view('form.pemasukan.edit')->with('l', $l);
    }

    public function updatepemasukan(Request $r)
    {
    	$l = LaporanKeuangan::find($r->input('id'));
    	$l->judul = $r->input('judul');
    	$l->jumlah = $r->input('jumlah');
    	$l->tanggal = $r->input('tanggal');
    	$l->rincian = $r->input('rincian');
    	$tipe = "1";
    	$l->tipe = $tipe;
    	$l->save();
        if (Auth::user()->role == 1) {
            return redirect(url('form/pemasukan'));
        }
    	return redirect(url('form/pemasukan'));
    }

    public function deletepemasukan($id)
    {
    	$l =  LaporanKeuangan::find($id);
    	$l->delete();
    	return redirect(url('form/pemasukan'));
    }

    public function deleteallPM(Request $request)
    {
        $l = $request->get('tanggal');
        $u = DB::table('laporan_keuangans')->where('tanggal', 'like', '%'.$l.'%');
        $u->delete();
        return redirect(url('form/pemasukan'));
    }

    public function indexpengeluaran()
    {
    	return view('form.pengeluaran.index');
    }

    public function addpengeluaran()
    {
    	return view('form.pengeluaran.add');
    }

    public function savepengeluaran(Request $r)
    {
    	$l = new LaporanKeuangan;
    	$l->judul = $r->input('judul');
    	$l->jumlah = $r->input('jumlah');
    	$l->tanggal = $r->input('tanggal');
    	$l->rincian = $r->input('rincian');
    	$tipe = "2";
    	$l->tipe = $tipe;
    	$l->save();

        $uang = $r->jumlah;
        $q = $r->saldo;

        $saldo = Saldo::find(1);
        $saldo->saldo = $q - $uang;
        $saldo->save();
    	return redirect(url('form/pengeluaran'));
    }

    public function editpengeluaran($id)
    {	
    	$l = LaporanKeuangan::find($id);
    	return view('pengeluaran/edit')->with('l', $l);
    }

    public function updatepengeluaran(Request $r)
    {
    	$l = LaporanKeuangan::find($r->input('id'));
    	$l->judul = $r->input('judul');
    	$l->jumlah = $r->input('jumlah');
    	$l->tanggal = $r->input('tanggal');
    	$l->rincian = $r->input('rincian');
    	$tipe = "2";
    	$l->tipe = $tipe;
    	$l->save();
    	return redirect(url('form/pengeluaran'));
    }

    public function deletepengeluaran($id)
    {
    	$l =  LaporanKeuangan::find($id);
    	$l->delete();
    	return redirect(url('form/pengeluaran'));
    }

    public function deleteallPG(Request $request)
    {
        $l = $request->get('tanggal');
        $u = DB::table('laporan_keuangans')->where('tanggal', 'like', '%'.$l.'%');
        $u->delete();
        return redirect(url('form/pengeluaran'));
    }
}	


