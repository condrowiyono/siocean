<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengajar extends Model
{
  protected $table = 'pengajar';
  protected $primaryKey = 'id';
  protected $fillable = ['id','user_id','instansi'

  						];

  public function biodata() {
    return $this->belongsTo('\App\User', 'user_id', 'id');
  }
}
