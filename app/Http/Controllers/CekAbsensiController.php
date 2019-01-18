<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CekAbsensi;
use Illuminate\Support\Facades\Auth;
use DB;
use Excel;
use App\Test;
use Illuminate\Support\Facades\View;    
use PDF;
use Expection;


class CekAbsensiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('form.cekabsensi.index');
    }

    public function delete($id)
    {
        $c = CekAbsensi::find($id);
        $c->delete();
        if (Auth::user()->role == 1) {
            return redirect(url('admin/cekabsensi'));
        }
        return redirect(url('cekabsensi'));
    }
     public function pdf()
    {

    $test = CekAbsensi::all();
      $pdf = PDF::loadView('form.cekabsensi.pdf');
      return $pdf->download('LaporanCekAbsensi.pdf');
    }
   
}
