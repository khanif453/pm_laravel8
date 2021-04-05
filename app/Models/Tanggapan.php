<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = "tanggapan";

    protected $fillable = ['pengaduan_id', 'tgl_tanggapan', 'tanggapan', 'petugas_id', 'status'];

    public function pengaduan(){
        return $this->belongsTo('App\Models\Pengaduan', 'id', 'id');
    }

    public function petugas(){
        return $this->belongsTo('App\Models\Petugas');
    }
}
