<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EPAULUX</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link media="screen and (min-width: 1024px)" href="css/style.css" rel="stylesheet">
    <link media="screen and (max-width: 1024px)" href="css/style_login_mob.css" rel="stylesheet">
    <link href="css/googlefont.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 	

</head>

<body>


    <div id="main">

        <div class="login">
            <a href="/">
                <img src="css/nvlogo.PNG" alt="">
            </a>
            <form method="POST" action="{{ route('login') }}" class="loginform" id="loginform">
                @csrf
                <h3>Se connecter</h3>
                <div class="input-box" >
                    <input type="text" id="loginemail" name="email">
                    <label class="loginemaillabel">Email</label>
                    <small>Email not valid</small>
                    <i class="fa fa-check-circle loginemailcheck"></i>
                    <i class="fa fa-exclamation-circle loginemailexclamation"></i>

                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="input-box">

                    <input type="password" id="loginpassword" class="password" name="password">
                    <label class="loginpasswordlabel">Mot de passe</label>
                    <i class="fa fa-check-circle loginpasswordcheck"></i>
                    <i class="fa fa-exclamation-circle loginpasswordexclamation"></i>
                    <i class="fa fa-eye seeloginpassword" aria-hidden="true"></i>
                    <i class="fa fa-eye-slash hideloginpassword" aria-hidden="true"></i>

                </div>
                    <div >
                <button type="submit" name="">Se connecter</button>
                <p><a href="{{ route('password.request') }}">Mot de passe oublié</a></p>
                <p><a href="{{ route('register') }}">Envie de nous rejoindre ? créer votre compte</a></p>
                    </div>

            </form>
        </div>

    </div>
    <!-- main  -->


    <script src="css/jquery.min.js"></script>
    <script src="css/popper.min.js"></script>
    <script src="css/bootstrap.min.js"></script>
    <script src="css/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>


<script>
$(document).ready(function() {
  
$(".loginpasswordlabel").css("margin-top", "-7%");
$(".loginpasswordlabel").css("margin-left", "2%");
$(".loginpasswordlabel").css("font-size", "12px");
$(".loginpasswordlabel").css("color", "grey");
$(".loginpasswordlabel").css("transition", "all 0.5s ease-in-out");

  
$(".loginemaillabel").css("margin-top", "-7%");
$(".loginemaillabel").css("margin-left", "2%");
$(".loginemaillabel").css("font-size", "12px");
$(".loginemaillabel").css("color", "grey");
$(".loginemaillabel").css("transition", "all 0.5s ease-in-out");

  

  });

$("#loginemail").keyup(function(){
            var v=$("#loginemail").val();
            if (!isValidEmailAddress(v)) {
               
                $("#loginemail").css({"box-shadow": " 0px 0px 5px 5px rgb(200, 20, 24)","padding":"5px","border":"none","border-radius":"7px"});
            }
            else{
                $("#loginemail").css({"box-shadow": " 0px 0px 5px 5px rgb(20, 100, 20)"});
         
        }
       
        });
        function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};
         $(".seeloginpassword").click(function() {

$("#loginpassword").attr("type", "text");
$(".seeloginpassword").hide();
$(".hideloginpassword").show();

});


$(".hideloginpassword").click(function() {

$("#loginpassword").attr("type", "password");
$(".hideloginpassword").hide();
$(".seeloginpassword").show();

});

/*/////////////////////// keep the label up and the input's design while typing ///////////////////////*/



$("#loginpassword").keyup(function() {
/*//////////////////////////////////// login password label ////////////////////////////////////*/

$("#loginpassword").css("border", "none");
$("#loginpassword").css("border-radius", "10px");
$("#loginpassword").css("box-shadow", "0 0 0 0.2rem rgba(0, 123, 255, 0.25)");

/*///////////////////////////////////// login password input /////////////////////////////////////*/

$(".loginpasswordlabel").css("margin-top", "-7%");
$(".loginpasswordlabel").css("margin-left", "2%");
$(".loginpasswordlabel").css("font-size", "12px");
$(".loginpasswordlabel").css("color", "grey");
$(".loginpasswordlabel").css("transition", "all 0.5s ease-in-out");

});

</script>      