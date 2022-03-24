
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>My Recipes</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

      
       
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        <!-- jquery validate -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
            <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 ">

                                <div class="card shadow-lg border-0 rounded-lg mt-5 booking">
                                    <div class="card-header"><h3 class="text-center font-weight-dark my-4">{{ __('Register') }}</h3></div>
                                    <div class="card-body ">
                                    <div class="booking-form">

                                    <form  id="form" method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="control-group">
                                                    <label for="name" class="col col-form-label text-left">{{ __('Enter Identification') }}</label>
                                                        <div class="input-group">
                                                            <input id="Identification" type="text" class="form-control  errorsito" name="Identification"   value="{{ old('Identification') }}" placeholder="Identification" required="required" required autocomplete="Identification" autofocus>
                                                                
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                                                                </div>
                                                        </div>
                                                </div>


                                              <div class="control-group">
                                                    <label for="name" class="col col-form-label text-left">{{ __('Enter Username') }}</label>
                                                        <div class="input-group">
                                                            <input id="name" type="name" class="form-control  @error('name') is-invalid @enderror" name="name"   value="{{ old('name') }}" placeholder="Name" required="required" required autocomplete="name" autofocus>
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="control-group">
                                                    <label for="email" class="col col-form-label text-left">{{ __('E-Mail Address') }}</label>
                                                        <div class="input-group">
                                                            <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email"   value="{{ old('email') }}" placeholder="Email" required="required" required autocomplete="email">
                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="control-group">
                                                    <label for="password" class="col col-form-label text-md-left">{{ __('Password') }}</label>
                                                            <div class="input-group"> 
                                                                    <input  class="form-control @error('password') is-invalid @enderror"  type="password" name="password" id="password"  placeholder="Password" required autocomplete="new-password">
                                                                        @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                         @enderror
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text" onclick="mostrarContrasena()"  ><i class="fas fa-eye"></i></div>
                                                                    </div>
                                                            </div>
                                                </div>

                                                <div class="control-group">
                                                    <label for="password-confirm" class="col col-form-label text-md-left">{{ __('Confirm Password') }}</label>
                                                            <div class="input-group"> 
                                                                    <input  class="form-control @error('password') is-invalid @enderror"  type="password" name="password_confirmation" id="password-confirm"  placeholder="Password" required autocomplete="new-password">
                                                                       
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text" onclick="mostrarContrasena()"  ><i class="fas fa-eye"></i></div>
                                                                    </div>
                                                            </div>
                                                </div>
                                                <div class="m-3 display-block">
                                                    <button class="btn custom-btn btn-block" type="submit">{{ __('Register') }}</button>
                                                </div>
                                        </form>
                                    </div>
                                    </div>
                                    <div class="card-footer text-center py-3">

                                        <div class="small"><a href="{{ route('login') }}">you already have an account!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>



       <div class=""></div>
    
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
       

        <!-- Template Javascript -->
        <!-- <script src="js/main.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
                function mostrarContrasena(){
                    var Shange = document.getElementById("password");
                    if(Shange.type == "password"){
                        Shange.type = "text";
                    }else{
                        Shange.type = "password";
                    }
                }
        </script>
         <!-- Scripts jquery validatio require -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.12/jquery.validate.unobtrusive.min.js"></script>
        
     

<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->