<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    static $rules = [
		'NOMBRE_PAIS' => 'required',
		'STATUS' => 'required',
    ];

    protected $perPage = 1000;

    protected $table = 'TIPOS_SERVICIOS';
    protected $fillable = ['title'];
    
    public $timestamps = false;
    protected $primaryKey = 'ID_TIPO_SERVICIO';

    public function preinscripcion(){
      return $this->hasMany(Preinscripcion::class);
    }
}
