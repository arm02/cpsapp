<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\UploadFile;
use Hash;
use Illuminate\Support\Facades\Response;
use DB;
use Excel;
use App\Test;
use Illuminate\Support\Facades\View;    
use PDF;
use Expection;

class UploadFileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index()
    {
    	return view('form.uploadfile.index');
    }
     public function downloadExcel($type)
    {
        $data = UploadFile::all()->toArray();
            
        return Excel::create('LaporanUploadFile', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function pdf()
    {

      $test = UploadFile::all();
      $pdf = PDF::loadView('form.uploadfile.pdf');
      return $pdf->download('LaporanUploadFile.pdf');
    }
    public function add()
    {
    	return view('form.uploadfile.add');
    }

    public function save(Request $r)
    {
    	$l = new UploadFile;
    	if(Input::hasFile('file')){
            $file = Input::file('file')->getClientOriginalName();
            Input::file('file')->move(public_path('file'),$file);
            $l->file = $file;

        }
        $l->nama = $r->input('nama');
    	$l->save();
    	return redirect(url('form/uploadfile'));
    }

    public function edit($id)
    {	
    	$l = UploadFile::find($id);
    	return view('form.uploadfile.edit')->with('l', $l);
    }

    public function update(Request $r)
    {
    	$l = UploadFile::find($r->input('id'));
    	$l->nama = $r->input('nama');
    	if(Input::hasFile('file')){
            $file = Input::file('file')->getClientOriginalName();
            Input::file('file')->move(public_path('file'),$file);
            $l->file = $file;
        }
    	$l->save();
    	return redirect(url('form/uploadfile'));
    }

    public function delete($id)
    {
    	$l =  UploadFile::find($id);
    	$l->delete();
    	return redirect(url('form/uploadfile'));
    }

    public function download($file)
    {
        $file_path = public_path('file/'.$file);
        return response()->download($file_path);
    }

}
