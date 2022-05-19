<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion extends Model
{
  static $rules = [
		'NOMBRE_PADRE' => 'required',
		'STATUS' => 'required',
    ];

    protected $perPage = 1000;

    protected $table = 'TANAK_PREINSCRIPCION';
    protected $fillable = ['title'];
    
    public $timestamps = false;
    protected $primaryKey = 'DOCUMENTO';

    /* public function estados(){
      return $this->hasMany(Estado::class);
    } */
}
