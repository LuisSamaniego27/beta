<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PERSONA extends Model
{
    static $rules = [
		'STATUS' => 'required',
    ];

    protected $perPage = 1000;

    protected $table = 'PER_PERSONAS';
    protected $fillable = ['title'];
    
    public $timestamps = false;
    protected $primaryKey = 'ID_PERSONA';
}
