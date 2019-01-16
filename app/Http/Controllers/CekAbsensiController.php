<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CekAbsensi;

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
        return redirect(url('form/cekabsensi'));
    }
}
