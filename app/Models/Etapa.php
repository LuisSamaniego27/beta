<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    /* static $rules = [
		'NOMBRE_PAIS' => 'required',
		'STATUS' => 'required',
    ]; */

    protected $perPage = 1000;

    protected $table = 'SER_ETAPAS';
    protected $fillable = ['title'];
    
    public $timestamps = false;
    protected $primaryKey = 'ID_ETAPA';

    public function preinscripcion(){
      return $this->hasMany(Preinscripcion::class);
    }
}
