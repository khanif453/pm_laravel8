<?php

namespace App\Models;

use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table ="pengaduan";

    protected $fillable = ['tgl_pengaduan', 'masyarakat_id', 'isi_laporan', 'foto', 'status'];

    public function masyarakat(){
        return $this->belongsTo('App\Models\Masyarakat');
    }

    public function tanggapan(){
        return $this->hasMany('App\Models\Tanggapan');
    }

    public function pengaduan()
    {
    	return $this->hasOne(Masyarakat::class,'masyarakat_id', 'id');
    }
}
