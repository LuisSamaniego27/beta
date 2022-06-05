<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sociedad extends Model
{
    static $rules = [
		'NOMBRE_SOCIEDAD' => 'required',
		'STATUS' => 'required',
    ];

    protected $perPage = 1000;

    protected $table = 'SOCIEDADES';
    protected $fillable = ['title'];
    
    public $timestamps = false;
    protected $primaryKey = 'ID_SOCIEDAD';
}
