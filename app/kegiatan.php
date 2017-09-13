<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
  protected $table = 'kegiatan';
  protected $primaryKey = 'id';
  protected $fillable = ['id','petugas_id','tempat','tanggal','deskripsi',

  						];

  public function penginput() {
    return $this->belongsTo('\App\petugas', 'petugas_id', 'id');
  }
}