<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion extends Model
{
    
    protected $perPage = 1000;

    protected $table = 'TANAK_PREINSCRIPCION';
    protected $fillable = ['title'];
    
    public $timestamps = false;
    protected $primaryKey = 'ID_PREINSCRIPCION';

    /* public function estados(){
      return $this->hasMany(Estado::class);
    } */
}
