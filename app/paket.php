<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
  protected $table = 'paket';
  protected $primaryKey = 'id';
  protected $fillable = ['id','pengajar_id','pelajaran','tahun','semester','jadwal_hari',
  						'jadwal_mulai','jadwal_selesai',
  						];

  public function pemilik() {
    return $this->belongsTo('\App\pengajar', 'pengajar_id', 'id');
  }
}
