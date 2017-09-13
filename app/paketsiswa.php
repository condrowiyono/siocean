<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paketsiswa extends Model
{
  protected $table = 'paketsiswa';
  protected $primaryKey = 'id';
  protected $fillable = ['id','pengajar_id','paket_id','siswa_id','status',
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