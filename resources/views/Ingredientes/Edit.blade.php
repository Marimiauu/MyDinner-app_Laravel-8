
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>My recipes</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

      
       
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- 
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

        <!-- Template Stylesheet --> 
        <link href="/css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
            <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 ">

                                <div class="card shadow-lg border-0 rounded-lg mt-5 booking">
                                    <div class="card-header"><h3 class="text-center font-weight-dark my-4">Edit</h3></div>
                                    <div class="card-body ">
                                    @include('flash::message')
                                   
                                    <div class="booking-form">
                                    
                                    <form action="/Ingredientes/Update" method="post" id="form">
                                        @csrf
                                        <input type="hidden" value="{{$Ingredient->Id}}" name="id"/>


                                            <div class="control-group">
                                                <div class="input-group">
                                                    <input type="file"  class="form-control"  name="Imagen" value="{{$Ingredient->Imagen}}"/>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="Nombre"   value="{{$Ingredient->Nombre}}" placeholder="Name"  autocomplete="off" />
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="input-group">
                                                    <select  class="form-control" name="IdClasification" id="IdClasification">
                                                        <option value="">
                                                            @foreach($clasificaciones as $Key=> $clasificacion)
                                                            <option {{$clasificacion->Id==$Ingredient->IdClasification ? 'selected' : ''}} value="{{$clasificacion->Id}}">{{$clasificacion->Nombre_Clasificacion}}</option>
                                                            @endforeach
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control " name="Descripcion" value="{{$Ingredient->Descripcion}}" placeholder="Descr"  autocomplete="off"  />
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control " name="Cantidad" value="{{$Ingredient->Cantidad}}" placeholder="Cant"   autocomplete="off"  />
                                                </div>
                                            </div>

                                            <div>
                                                <button class="btn custom-btn  " type="submit">Save</button>
                                            </div>
                                     </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>



       
    
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Scripts jquery validatio require -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.12/jquery.validate.unobtrusive.min.js"></script>
      

        <script>
               $().ready(function() {
                $("#form").validate({
                    rules: {
                        Nombre:{
                            required: true,
                            number: false,
                            minlength: 3,
                           maxlength:30

                        },
                        IdClasification: { 
                            required:true
                         },
                        Descripcion: { 
                            required:true
                         },
                         Cantidad:{
                            required: true,
                            number: true,
                            minlength: 1,
                           maxlength:4
                        }
                        
                    },
                    messages: {

                         Nombre:{
                            required: "The Nombre is required!!",
                            number: "Please don't enter your Nombre as a numerical value",
                            minlength: "quantity number must be min 3 characters long",
                            maxlength:"quantity number must not be more than 30 characters long"
                        },
                       

                        IdClasification: "The Clasification is required!!",

                        Descripcion: "The Descripcion is required!!",

                        Cantidad:{ 
                            required: "The Cantidad is required!!",
                            number: "Please enter your age as a numerical value",
                            minlength: "quantity number must be min 1 characters long",
                            maxlength:"quantity number must not be more than 4 characters long"
                         },

                       
                       
                    }
                });
            });
        </script>

        <script>
                jQuery.validator.addMethod("nuestraValidacion",
                function(value, element) {
                        return /^[A-Za-z\d=#$%@_ -]+$/.test(value);
                    },
                "Nada de caracteres especiales, por favor"
                );
        </script>
    </body>
</html>