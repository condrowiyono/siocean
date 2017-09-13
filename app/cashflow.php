<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cashflow extends Model
{
  protected $table = 'cashflow';
  protected $primaryKey = 'id';
  protected $fillable = ['id','petugas_id','tanggal','jenis','uraian','banyaknya','saldo',

  						];

  public function penginput() {
    return $this->belongsTo('\App\petugas', 'petugas_id', 'id');
  }

}