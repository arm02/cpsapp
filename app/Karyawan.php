<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public $fillable = ['nama','alamat','telpon','tanggalmasuk','gajipokok','tunjangan','status','keterangan','rincian'];
}
