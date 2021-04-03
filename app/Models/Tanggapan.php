<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = "tanggapan";

    protected $fillable = ['id_tanggapan', 'id_pengaduan', 'tgl_tanggapan', 'tanggapan', 'id_petugas', 'status'];

    public function pengaduan(){
        return $this->belongsTo('App\Models\Pengaduan', 'id', 'id');
    }

    public function petugas(){
        return $this->belongsTo('App\Models\Petugas');
    }
}
