<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use \App\Webcam;
use Carbon\Carbon;
class WebcamController extends Controller
{
    public function index()
    {
        return view('webcam.index');
    }

    public function save(Request $r)
    {
    	$nama = $r->nama;
    	$image = $r->input('gambar');
        $image = str_replace('data:image/jpeg;base64,','', $image);
        $image = base64_decode($image);
        $filename = 'webcam_'.uniqid().'.png';
        file_put_contents('uploads/'.$filename,$image);
        $now = Carbon::now();
        $webcam = new \App\CekAbsensi;
        $webcam->nama = $nama;
        $webcam->foto = $filename;
        $webcam->jammasuk = \Carbon\Carbon::now()->format('d F Y, H:i');
        $webcam->save();

        return redirect(url('/'));
    }

}
