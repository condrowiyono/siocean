<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
  protected $table = 'petugas';
  protected $primaryKey = 'id';
  protected $fillable = ['id','user_id','posisi'

  						];

  public function biodata() {
    return $this->belongsTo('\App\User', 'user_id', 'id');
  }
}

