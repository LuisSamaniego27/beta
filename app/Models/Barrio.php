<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    static $rules = [
		'ID_CIUDAD ' => 'required',
        'NOMBRE_BARRIO ' => 'required',
		'STATUS' => 'required',
    ];

    protected $perPage = 1000;

    protected $table = 'GEO_BARRIOS';
    protected $fillable = ['title'];
    
    public $timestamps = false;
    protected $primaryKey = 'ID_BARRIO';
    
}
