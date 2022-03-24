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
                                     
                                    <form action="/Clasificaciones/Update" method="post" id="form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$Clasific->Id}}"/>
                                <div class="control-group">
                                    <div class="input-group">
                                      
                                        <input type="text" value="{{$Clasific->Nombre_Clasificacion}}" class="form-control" name="Nombre_Clasificacion"  id="Nombre_Clasificacion" autocomplete="off" placeholder="Name"  required="required"  required/>
                                       
                                        <div class="input-group-append">
                                       
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <button class="btn custom-btn  " type="submit">Edit</button>
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

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
       
        
        
    
        <!-- Scripts jquery validatio require -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.12/jquery.validate.unobtrusive.min.js"></script>
        <script>
             $().ready(function() {

                $("#form").validate({
                    rules: {
                        Nombre_Clasificacion:{
                            required: true,
                            minlength: 4,
                        maxlength:15,
                        lettersonly: true

                        }
                        
                    },
                    messages: {

                        Nombre_Clasificacion:{
                            required: "The name is required!! letters only mate please",
                            minlength: "quantity number must be min 4 characters long",
                            maxlength:"quantity number must not be more than 15 characters long"
                        },
                    }
                });
             });
        </script>

    </body>
</html>