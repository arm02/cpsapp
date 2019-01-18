<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisiMisi;

class VisiMisiController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	return view('form.visimisi.index');
    }

  	public function edit($id)
    {
    	$v = VisiMisi::where('id', 1)->first();
    	return view('form.visimisi.edit')->with('v', $v);
    }

    public function update(Request $r)
    {
    	$v = VisiMisi::find(1);
    	$v->visi = $r->visi;
    	$v->misi = $r->misi;
    	$v->save();
    	return redirect(url('form/visimisi'));	
    }
}
