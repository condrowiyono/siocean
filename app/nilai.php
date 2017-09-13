<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
  protected $table = 'nilai';
  protected $primaryKey = 'id';
  protected $fillable = ['id','pengajar_id','paket_id','siswa_id','nilai','materi','deskripsi','tanggal',
  						];

  public function paketnya() {
    return $this->belongsTo('\App\paket', 'paket_id', 'id');
  }
  public function pengajarnya() {
    return $this->belongsTo('\App\pengajar', 'pengajar_id', 'id');
  }
  public function siswanya() {
    return $this->belongsTo('\App\siswa', 'siswa_id', 'id');
  }
}
