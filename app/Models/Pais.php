<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{

    static $rules = [
		'NOMBRE_PAIS' => 'required',
		'STATUS' => 'required',
    ];

    protected $perPage = 1000;

    protected $table = 'GEO_PAIS';
    protected $fillable = ['title'];
    
    public $timestamps = false;
    protected $primaryKey = 'ID_PAIS';

    public function estados(){
      return $this->hasMany(Estado::class);
    }
}
