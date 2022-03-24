<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Recipes</title> 
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- select 2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

        <!-- Template Stylesheet --> 
        <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    
<div class="booking-form">
    <form action="/DetalleReceta/Save" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card shadow-lg border-0 rounded-lg mt-5 booking">
                    <div class="card-head"><h4 class="text-center">Info Receta</h4></div>
                    <div class="card-body row">
                        <div class="form-group col-6">
                            <label for="">Name Recipe</label>
                            <input type="text" class="form-control" name="Nombre_R">
                        </div>
                        <div class="form-group col-6">
                            <label for="">Quanty Recipe</label>
                            <input readonly id="Cnt" type="text" class="form-control" name="Cantidad_Ing">
                        </div>

_                    </div> 
                </div>
            </div>

            <div class="col-6">
                <div class="card shadow-lg border-0 rounded-lg mt-5 booking">
                    <div class="card-head"><h4 class="text-center">info Ingredientes</h4></div>
                    <div class="card-body row">

                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Ingredient</label>
                                <select id="ingredientes" name="ingredientes" class="form-control" onchange="Agg_Attr()">
                                    <option value="">Selection</option>
                                    @foreach($ingredientes as $value)
                                    <option IdClasification="{{$value->IdClasification}}" Descripcion="{{$value->Descripcion}}" Cantidad="{{$value->Cantidad}}"  value="{{$value->Id}}">{{$value->Nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                            <label for="">Description</label>
                            <input id="Descripcion" type="text" class="form-control " name="Descripcion" value="Ingredient Description" readonly />
                               </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                    <label for="">Quanty</label>
                                    <input  id="Cantidad" type="number" class="form-control" name="Cantidad">
                            </div>
                        </div>
                        <!-- <div class="col-4">
                        <div class="form-group">  
                                <label for="">Quanty available</label>
                                <input id="cant" type="text" class="form-control " name="Cantidad"  readonly />
                             </div>
                        </div> -->
                    <div class="col-12">
                    <button onclick="AggIngredient()" type="button" class="btn btn-success float-right btn-sm">Agregar</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ingredient</th>
                            <th>Description</th>
                            <th>Quanty</th>
                            <th>Option</th>
                        </tr>

                    </thead>
                    <tbody id="Table_Ingredients">

                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col" style="display: flex; justify-content: center; align-items: center;">
                <button type="submit" class="btn custom-btn">Save</button>

                </div>
                
            </div>

            </div>
        </div>
    </form>

</div>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
     
        

        <!-- jquery  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function(){
                $("select").select2();
            });
        </script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Scripts jquery validatio require -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.12/jquery.validate.unobtrusive.min.js"></script>

        <script>
            function Agg_Attr(){
                let desc=$("#ingredientes option:selected").attr("Descripcion");
                $("#Descripcion").val(desc);

                let IdClasification=$("#ingredientes option:selected").attr("IdClasification");
                $("#IdClasification").val(IdClasification);

                // let cant=$("#ingredientes option:selected").attr("Cantidad");
                // $("#cant").val(cant);
            }

            function AggIngredient(){

                let Id = $("#ingredientes option:selected").val();
                let Text_ingredient = $("#ingredientes option:selected").text();
                let IdClasification=$("#IdClasification").val();
                let Cantidad = $("#Cantidad").val();
                let Descripcion = $("#Descripcion").val();
              



                $("#Table_Ingredients").append(`
             <tr id="tr-${Id}">
                <td>
                
                    <input type="hidden" name="Id[]" value="${Id}" />
                    <input type="hidden" name="IdClasification[]" value="${IdClasification}" />
                    ${Text_ingredient}
                </td>

                <td>
                    <input type="hidden" name="Descripcion[]" value="${Descripcion}" />
                    ${Descripcion}
                </td>

                <td>
                    <input type="hidden" name="Cantidades[]" value="${Cantidad}" />
                    ${Cantidad}
                </td>

                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="Delete_Ingredient(${Id})"><i class="fas fa-trash-alt"></i></button>
                
                </td>
             </tr>
            `);

            // let cant = $("#cant").val() || 0;
            // $("#cant").val(cant-Cantidad); 


            let Cnt = $("#Cnt").val() || 0;
            $("#Cnt").val(parseInt(Cnt) + 1); 
            


            }


            function Delete_Ingredient(id,quanty){
                $("#tr-"+id).remove();
            //       let Cant =$("#cant").val() || 0;
            // $("#cant").val(parseInt(Cant)+parseInt(quanty)); 

            let Cnt = $("#Cnt").val() || 0;
            $("#Cnt").val(parseInt(Cnt) - 1); 
            

            }

            
        </script>
</body>
</html>