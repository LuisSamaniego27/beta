<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    static $rules = [
		'NOMBRE_CIUDAD ' => 'required',
		'STATUS' => 'required',
    ];

    protected $perPage = 1000;

    protected $table = 'GEO_CIUDAD';
    protected $fillable = ['title'];
    
    public $timestamps = false;
    protected $primaryKey = 'ID_CIUDAD';

    //la unificacion con la clave foranea
    public function estados(){
      return $this->belongsTo('App\Estado', 'ID_ESTADO');
  }
}
