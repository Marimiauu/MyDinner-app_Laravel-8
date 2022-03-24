<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
        public $table = 'Recetas';
        
        protected $primaryKey='Id_Recipe';

        protected $fillable=['Nombre_R','Cantidad_Ing'];

        public static $rules =[ 
        'Nombre_R'=>'required|min:3|max:100|string',
        'Cantidad_Ing'=>'required|min:0|max:100000'
    ]; 

    public $timestamps = false; 
}
