<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table ="pengaduan";

    protected $fillable = ['tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status'];

    public function masyarakat(){
        return $this->belongsTo('App\Models\Masyarakat');
    }

    public function tanggapan(){
        return $this->hasMany('App\Models\Tanggapan');
    }
}
