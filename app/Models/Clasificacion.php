<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
        public $table = 'Clasificaciones';
        
        protected $primaryKey='Id';

        protected $fillable=['Nombre_Clasificacion','Estado'];

        public static $rules =[ 
        'Nombre'=>'required|min:3|max:100|string',
            'Estado'=>'in:1,0'
    ]; 

    public $timestamps = false; 
}
