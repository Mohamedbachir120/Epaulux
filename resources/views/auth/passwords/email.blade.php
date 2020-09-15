<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EPAULUX</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
   
    <link href="../css/googlefont.css" rel="stylesheet">
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/aos.css" rel="stylesheet">
    <link media="screen and (min-width: 1024px)" href="../css/style.css" rel="stylesheet">
    <link media="screen and (max-width: 1024px)" href="../css/style_email_mob.css" rel="stylesheet">
 
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 	

</head>

<body>

  
    <div id="main">
        <div class="navrecuperationmdp">
            <a href="/login">
                <img src="../css/fleche.PNG" class="fleche" alt="">
            </a>
            <a href="index.html">
                <img src="../css/logomdp.PNG" class="logo" alt="">
            </a>
        </div>


        <div class="mdpoubliee"></div>

                    <form method="POST" action="{{ route('password.email') }}" class="recuperationmdp" id="mdpoublieform">
                        @csrf
                        <h4>Mot de passe oublié</h4>
                        <p>Entrez votre e-mail pour recevoir un code de réinitialisation</p>
                       
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Envoyer le lien
                                </button>
                            </div>
                        </div>
                    </form>
 
                </div>
                <!-- main  -->
            
            
                <script src="../css/jquery.min.js"></script>
                <script src="../css/popper.min.js"></script>
                <script src="../css/bootstrap.min.js"></script>
                <script src="../css/aos.js"></script>
                <script>
                    AOS.init();
                </script>
            
            </body>
            
            </html>
            
       