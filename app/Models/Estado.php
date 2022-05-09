<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
  
    static $rules = [
		//'NOMBRE_ESTADO' => 'required|unique:GEO_ESTADO,NOMBRE_ESTADO',
    'NOMBRE_ESTADO' => 'required',
		'STATUS' => 'required',
    ];

    protected $perPage = 1000;

    protected $table = 'GEO_ESTADO';
    protected $fillable = ['title'];
    
    public $timestamps = false;
    protected $primaryKey = 'ID_ESTADO';

    //la unificacion con la clave foranea
    public function paises(){
      return $this->belongsTo('App\Pais', 'ID_PAIS');
    }
}
