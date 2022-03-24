<?php

namespace App\Http\Controllers;
use App\Models\Clasificacion;
use App\Models\Ingrediente;
use App\Models\Receta;
use App\Models\Detalle_Receta;

// use DataTables; 
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;

class DetalleRecetaController extends Controller
{

    public function Index(Request $request)
    {
        $Id = $request->input("Id");
        $Ing = [];
        if ($Id != null) {
            $Ing = Ingrediente::select("Ingredientes.*","Detalle_Recetas.Quantity as Quantity_Q")
            ->join("Detalle_Recetas","Ingredientes.Id", "=" ,"Detalle_Recetas.IdIngrediente")
            ->where("Detalle_Recetas.Id_Recipe", $Id)
            ->get();
        }
        $Recipes = Receta::select("Recetas.*")
        ->get();
        // $Recipes = Receta::all();
        return view("DetalleReceta.Index",compact("Recipes","Ing"));
    }

    public function Create(){ 
        // $clasificaciones=Clasificacion::all();
        $ingredientes=Ingrediente::all();
        return view("DetalleReceta.Create", compact("ingredientes"));
    }

    public function Save(Request $request)
    {
        $input =$request->all();
        try {
            DB::beginTransaction();

            $receta = Receta::create([
                "Nombre_R" => $input["Nombre_R"],
                "Cantidad_Ing" => $input["Cantidad_Ing"]
             ]);

            foreach ($input["Id"] as $key => $value) {
            
                Detalle_Receta::create([ 
                    "IdIngrediente" => $value,
                    "Id_Recipe" => $receta->Id_Recipe,
                    "Quantity" => $input["Cantidades"][$key],  

                 ]);

                 $ing = Ingrediente::find($value);
                 $ing->update(["Cantidad"=> $ing->Cantidad -  $input["Cantidades"][$key]
                ]);
             }

            DB::commit();
            
            Flash::success('Se ha creado la Receta correctamente');
            return redirect('/DetalleReceta'); 

        } catch (\Exception $e) {

           DB::rollBack();  
           
           Flash::error('la Receta no se pudo crear correctamente');
           return redirect('/DetalleReceta');

        }
    }
}

