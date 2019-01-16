<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use DB;
use Excel;
use App\Test;
use Illuminate\Support\Facades\View;	
use PDF;
use Expection;

class TestController extends Controller
{
    public function importExport()
    {
    	return view('importExport');
    }

   public function downloadExcel($type)
    {
        $data = Test::get()->toArray();
            
        return Excel::create('Laporan', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }


	public function importExcel(Request $request)
	{
		$request->validate([
			'import_file' => 'required'
		]);

		$path = $request->file('import_file')->getRealPath();
		$data = Excel::load($path)->get();

		if($data->count()){
			foreach ($data as $key => $value){
				$arr[] = ['judul' => $value->judul, 'Keterangan' => $value->keterangan,'tanggal' => $value->tanggal];
			}

			if(!empty($arr)){
				Test::insert($arr);
			}
		}

		return back()->with('sucess','Berhasil Insert');
	} 
	public function create()
	{
		return view('create');
	}
	public function simpan(Request $r)
	{
		$judul = $r->judul;
		$keterangan = $r->keterangan;
		$tanggal = $r->tanggal;
		$gambar = $r->gambar;

		$simpan = new Test;
		$simpan->judul = $judul;
		$simpan->keterangan = $keterangan;
		$simpan->tanggal = $tanggal;

		$file = $r->file('gambar');
		$filename = $file->getClientOriginalName();
		$r->file('gambar')->move("gambar/", $filename);
		$simpan->gambar = $filename;
		$simpan->save();
		return view('create');
	}

	public function word()
	{
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$phpWord->addParagraphStyle('Heading2', array('alignment' => 'center'));
$section = $phpWord->addSection();
$html = '<table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>wa</td>
                    <td>sd</td>
                    <td>sd</td>
                    <td>sd</td>
                    <td>sd</td>
                </tr>
            </tbody>
        </table>';

\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);
        //handle exception
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('helloWorld.docx'));
        } catch (Exception $e) {
        }


        return response()->download(storage_path('helloWorld.docx'));
    }
	public function pdf()
	{

		$test = Test::all();
      $pdf = PDF::loadView('pdf', compact('test'));
      return $pdf->download('Laporan.pdf');
	}
}