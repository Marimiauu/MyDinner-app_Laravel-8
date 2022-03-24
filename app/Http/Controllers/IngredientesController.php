<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\Clasificacion;
use DataTables; 
use Alert;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;


 
class IngredientesController extends Controller
{
    public function Index(){ 
        
        return view("Ingredientes.Index");
          
    }
    public function Listar(Request $request)
    {
    $Ingredient=Ingrediente::select("Ingredientes.*","Clasificaciones.Nombre_Clasificacion")->join("Clasificaciones","Ingredientes.IdClasification","=","Clasificaciones.Id")->get();
    return DataTables::of($Ingredient)

    ->editColumn('Imagen',function($Ingredientes){
        $defecto="Defecto.jpg";
        return "<img src='" .($Ingredientes->Imagen == null ? "/uploads/".$defecto : "/uploads/".$Ingredientes->Imagen)."' width='100px'>";
    })
    ->editColumn('Estado',function($ingrediente){
        return $ingrediente->Estado ==1 ? "Activo" : "Inactivo";
    })
    ->addColumn('editar',function($ingrediente){
        return '<a class="btn btn-primary btn-sm" href="/Ingredientes/Edit/'.$ingrediente->Id.'"><i class="fas fa-edit"></i></a>';
    })
    ->addColumn('cambiar',function($ingrediente){
        if ($ingrediente->Estado==1) {
            return '<a class="btn btn-danger btn-sm" href="/Ingredientes/UpdateState/'.$ingrediente->Id.'/0"><i class="fas fa-exclamation-circle"></i></a>';
        }else {
            return '<a class="btn btn-success btn-sm" href="/Ingredientes/UpdateState/'.$ingrediente->Id.'/1"><i class="fas fa-check-double"></i></a>';
        }
       
    })
    ->rawColumns(['Imagen','editar','cambiar'])
    ->make(true);
    
    }

    public function Create(){
        $clasificaciones= Clasificacion::all();
        return view('Ingredientes.Create',compact("clasificaciones"));
    }
     public function Save( Request $request)
    {
        // $request->validate(Ingrediente::$rules);
       $Ingredient=$request->all();
       try {
        //    $Imagen=null; 
        // if ($request->$Imagen != null) {
           
            // $Imagen = time().'.'.$request->Imagen->extension();  
            // $request->Imagen->move(public_path('uploads'), $Imagen);
        
        // }

        // Ingrediente::create($Ingredient);
        //Otra forma de crear el ingrediente
        $Imagen = time().'.'.$request->Imagen->getClientOriginalExtension();  
        $request->Imagen->move(public_path('uploads'), $Imagen);

        Ingrediente::create([
            "Imagen"=>$Imagen, 
            // "Imagen"=>$Ingredient["Imagen"],
            "Nombre"=>$Ingredient["Nombre"],
            "IdClasification"=>$Ingredient["IdClasification"],
            "Descripcion"=>$Ingredient["Descripcion"],
            "Cantidad"=>$Ingredient["Cantidad"],
            "Estado"=>1,

        ]);

       
        Flash::success("Ingrediente actualizado correctamente");
           return redirect('/Ingredientes');
       } catch (\Exception $e) {
        Flash::error("Ingrediente no encontrado");
           return redirect('/Ingredientes/Create');
        //    ->with('success','creado correctamente');

       }
      
    } 

    public function Edit($id)
    {
        $clasificaciones= Clasificacion::all();
        $Ingredient=Ingrediente::find($id);
        if ($Ingredient==null) {
            Flash::error("Ingrediente no encontrado");
           return redirect("/Ingredientes");
        }

        return view("/Ingredientes/Edit",compact("Ingredient","clasificaciones")); 
    }

    public function Update( Request $request)
    {
        // $request->validate(Ingrediente::$rules);
       $Ingredient=$request->all();
       try {

        $Ingrediente=Ingrediente::find($Ingredient["id"]);
        if ($Ingrediente==null) {
            Flash::error("Ingrediente no encontrado");
           return redirect("/Ingredientes");
        }
        // return view("/Ingredientes/Edit",compact("Ingredient"));
         //Otra forma de crear el ingrediente
        // $Ingredient->update($Ingredient);

        // $Imagen = time().'.'.$request->Imagen->getClientOriginalExtension();  
        // $request->Imagen->move(public_path('uploads'), $Imagen);

        $Ingrediente->update([
            "Imagen"=>$Ingredient["Imagen"], 
            "Nombre"=>$Ingredient["Nombre"],
            "IdClasification"=>$Ingredient["IdClasification"],
            "Descripcion"=>$Ingredient["Descripcion"],
            "Cantidad"=>$Ingredient["Cantidad"],
            "Estado"=>1
            
        ]);

        Flash::success("Ingrediente actualizado correctamente");
        
           return redirect('/Ingredientes');
       } catch (\Exception $e) {
        Flash::error($e);
           return redirect('/Ingredientes');
       }
    }

    public function UpdateState($id, $estado)
    {
        $Ingredient=Ingrediente::find($id);
        if ($Ingredient==null) {
            Flash::error("Ingrediente no encontrado");
           return redirect("/Ingredientes");
        }
     
            $Ingredient->update(["Estado"=>$estado]);
            Flash::success("Se ha modificado el estado del  Ingrediente");
            return redirect("/Ingredientes");
   
            return redirect("/Ingredientes");
        
    }
}
 
