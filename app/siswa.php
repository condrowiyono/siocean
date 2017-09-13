<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
  protected $table = 'siswa';
  protected $primaryKey = 'id';
  protected $fillable = ['id','user_id','asalsekolah','kelas','nama_ortu','pekerjaan_ortu'

  						];

  public function biodata() {
    return $this->belongsTo('\App\User', 'user_id', 'id');
  }
}
