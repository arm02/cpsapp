<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CekAbsensi;
use Illuminate\Support\Facades\Auth;

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
}
