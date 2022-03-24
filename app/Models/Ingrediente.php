<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
   // use HasFactory;
   public $table = 'Ingredientes';
    
   protected $primaryKey='Id';

   protected $fillable=['IdClasification','Imagen','Nombre','Descripcion','Cantidad','Estado'];

   public static $rules =[ 
   'IdClasification'=>'required|exists:Clasificaciones,Id',
   // 'Imagen'=>'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
   'Nombre'=>'required|min:3|max:100|string',
   'Descripcion'=>'required|min:3|max:100|string',
   'Cantidad'=>'required|min:0|max:100000',
       'Estado'=>'in:1,0'
]; 

   // public $timestamps = false;
}
