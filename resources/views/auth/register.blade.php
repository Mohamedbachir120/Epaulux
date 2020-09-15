<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EPAULUX</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link media="screen and (min-width: 1024px)" href="css/style.css" rel="stylesheet">
    <link media="screen and (max-width: 1024px)" href="css/style_res_subscribe.css" rel="stylesheet">
  
    <link href="css/googlefont.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 	

</head>

<body>


    <div id="main">


        <div class="navinscription" >
            <a href="/home"><img src="css/nvlogo.PNG" alt=""></a>
            <h1>Bienvenue !</h1>

        </div>
                    <form method="POST" action="{{ route('register') }}" class="form-inscription row" id="subscribeform">
                        @csrf
                        <div class="info">
        
                        <div class="f-control">
                            <label for="name"  >{{ __('Name') }}</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                <i class="fa fa-user"></i>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                        
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            


                        </div>

                        <div class="f-control">
                            <label for="prenom"  >prénom</label>
                                <input id="prenom" type="text" class="form-control" name="prenom" required >
                                <i class="fa fa-user"></i>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                        
                            </div>
                    
                        <div class="f-control">

                            <label for="adresse"  >Adresse</label>
                             
                                <input id="adresse" type="text" class="form-control" name="adresse" required >
                                <i class="fa fa-map-marker"></i>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                        
                 
                            </div>
                        <div class="f-control">
                    
                            <label for="phone_number"  >Numéro de Téléphone</label>
                        
                           
                                <input id="phone_number" type="tel" pattern="[0-9]{10,}" class="form-control" name="phone_number" required >
                                <i class="fa fa-phone"></i>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                        
                    
                            </div>
                     
                   

                      </div>
                      <div class="compte">

                        <div class="f-control">
                            <label for="email"  >{{ __('E-Mail Address') }}</label>

                                 <input id="subscribeemail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                     @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <i class="fa fa-envelope"></i>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                        
                              
                        </div>
            
                      <div class="f-control">
                        <label for="password"  >{{ __('Password') }}</label>

                       
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <i class="fa fa-eye seesubscribepassword"></i>
                            <i class="fa fa-eye-slash hidesubscribepassword"></i>
                            <i class="fa fa-check-circle"></i>
                            <i class="fa fa-exclamation-circle"></i>
                            <small>Error message</small>
                    
                         
                        </div>
                   
               
                        <div class="f-control">
                            <label for="password-confirm"  >{{ __('Confirm Password') }}</label>
                                                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                   <i class="fa fa-eye seesubscribepassword"></i>
                                                   <i class="fa fa-eye-slash hidesubscribepassword"></i>
                                                   <i class="fa fa-check-circle"></i>
                                                   <i class="fa fa-exclamation-circle"></i>
                                                   <small>Error message</small>
                                           
                               
                                                </div>
                       

                        
                        <div class="f-control">
                            <label for="username"  >Username</label>
                           
                                <input id="username" type="text" class="form-control" name="username" required >
                                <i class="fa fa-user"></i>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                        
                          
                            </div>



                        <div class="f-control mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btnvalidation">
                                   S'inscrire
                                                                </button>
                            </div>
                        </div>
                      </div>
                    </form>
                </div>

                <script src="css/popper.min.js"></script>
                <script src="css/bootstrap.min.js"></script>
                <script src="css/aos.js"></script>
                <script>
                  $(document).ready(function() {
$(".seesubscribepassword").click(function() {
            $("#subscribepassword").attr("type", "text");
            $(".seesubscribepassword").hide();
            $(".hidesubscribepassword").show();
        });


        $(".hidesubscribepassword").click(function() {
            $("#subscribepassword").attr("type", "password");
            $(".hidesubscribepassword").hide();
            $(".seesubscribepassword").show();
        });


        $(".seesubscribepasswordcheck").click(function() {
            $("#subscribepasswordcheck").attr("type", "text");
            $(".seesubscribepasswordcheck").hide();
            $(".hidesubscribepasswordcheck").show();
        });


        $(".hidesubscribepasswordcheck").click(function() {
            $("#subscribepasswordcheck").attr("type", "password");
            $(".hidesubscribepasswordcheck").hide();
            $(".seesubscribepasswordcheck").show();
        });});
                </script>
            
            </body>
            
      
            </html>
            
            
            