<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanKeuangan extends Model
{
    public $fillable = ['judul','jumlah','tanggal','rincian','tipe'];
}
