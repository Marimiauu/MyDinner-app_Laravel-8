<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use DataTables; 
use Laracasts\Flash\Flash;

use Illuminate\Http\Request;



class ClasificacionesController extends Controller
{
    public function Index()
    {
        return view("Clasificaciones.Index");
    }

    public function Listar(Request $request)
    {
    $Clasific=Clasificacion::all();
    return DataTables::of($Clasific)
    ->editColumn('Estado',function($clasificacion){
        return $clasificacion->Estado ==1 ? "Activo" : "Inactivo";
    })
    ->addColumn('editar',function($clasificacion){
        return '<a class="btn btn-primary btn-sm" href="/Clasificaciones/Edit/'.$clasificacion->Id.'"><i class="fas fa-edit"></i></a>';
    })
    ->addColumn('cambiar',function($clasificacion){
        if ($clasificacion->Estado==1) { 
            return '<a class="btn btn-danger btn-sm" href="/Clasificaciones/UpdateState/'.$clasificacion->Id.'/0"><i class="fas fa-exclamation-circle"></i></a>';
        }else {
            return '<a class="btn btn-success btn-sm" href="/Clasificaciones/UpdateState/'.$clasificacion->Id.'/1"><i class="fas fa-check-double"></i></a>';
        }
       
    })
    ->rawColumns(['editar','cambiar'])
    ->make(true);
    }

    public function Create(){
        return view('Clasificaciones.Create');
    }
     public function Save( Request $request)
    {
        // $request->validate(Ingrediente::$rules);
       $Clasific=$request->all();
       try {

        // Ingrediente::create($Ingredient);
        //Otra forma de crear el ingrediente
        Clasificacion::create([
            "Nombre_Clasificacion"=>$Clasific["Nombre_Clasificacion"],
            "Estado"=>1
        ]);
           Flash::success('Se ha creado la Clasificacion correctamente');
           return redirect('/Clasificaciones');
       } catch (\Exception $e) {
           Flash::error('Clasificacion no encontrada');
           return redirect('/Clasificaciones/Create');
        //    ->with('success','creado correctamente');

       }
      
    } 


    public function Edit($id)
    {
        $Clasific=Clasificacion::find($id);
        if ($Clasific==null) {
           Flash::error("Clasificacion no encontrada");
           return redirect("/Clasificaciones");
        }

        return view("/Clasificaciones/Edit",compact("Clasific"));
    }

    public function Update( Request $request)
    {
        // $request->validate(Ingrediente::$rules);
       $Clasific=$request->all();
       try {

        $clasificacion=Clasificacion::find($Clasific["id"]);
        if ($clasificacion==null) {
           Flash::error("Clasificacion no exixte");
           return redirect("/Clasificaciones");
        }
        // return view("/Ingredientes/Edit",compact("Ingredient"));
         //Otra forma de crear el ingrediente
        // $Ingredient->update($Ingredient);
        $clasificacion->update([
            "Nombre_Clasificacion"=>$Clasific["Nombre_Clasificacion"],
            "Estado"=>1
            
        ]);

        Flash::success("Clasificacion actualizada correctamente");
        
           return redirect('/Clasificaciones');
       } catch (\Exception $e) {
        Flash::error($e);
           return redirect('/Clasificaciones');
       }
    }



    public function UpdateState($id, $estado)
    {
        $Clasific=Clasificacion::find($id);
        if ($Clasific==null) {
           Flash::error("Clasificacion no encontrada");
           return redirect("/Clasificaciones");
        }
        try {
            $Clasific->update(["Estado"=>$estado]);
            Flash::success("Se ha modificado el estado de la clasificacion");
            return redirect("/Clasificaciones");
        } catch (\Exception $e) {
            Flash::success("No se ha modificado estado de la clasificacion");
            return redirect("/Clasificaciones");
        }
    }

}

