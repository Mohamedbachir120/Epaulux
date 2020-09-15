<?php 
include("inc/header.php");

?>

<div class="navinscription">
    <a href="index.php"><img src="img/nvlogo.PNG"  alt=""></a>
    <h1>Bienvenue !</h1>

</div>
 


<form action="" class="form-inscription row " id="form">

    <div class="info">
        <div class="f-control ">
            <label>Nom</label>
            <input type="text" placeholder="Votre nom" id="nom">
            <i class="fa fa-user"></i>
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error message</small>
        </div>

        <div class="f-control ">
            <label>Prénom</label>
            <input type="text" placeholder="Votre Prénom" id="prenom">
            <i class="fa fa-user"></i>
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error message</small>
        </div>

        <div class="f-control ">
            <label>Téléphone</label>
            <input type="text" maxlength="10" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" placeholder="Votre numéro de téléphone" id="tel">
            <i class="fa fa-phone"></i>
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error message</small>

        </div>

        <div class="f-control ">


            <label>Adresse</label>
            <input type="text" placeholder="Votre adresse" id="adresse">
            <i class="fa fa-map-marker"></i>
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error message</small>


        </div>




    </div>
    <div class="compte">
        <div class="f-control ">

            <label>E-mail</label>
            <input type="email" placeholder="Votre e-mail" id="email">
            <i class="fa fa-envelope"></i>
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error message</small>

        </div>
        <div class="f-control ">

            <label>Mot de passe</label>
            <input type="password" class="password" id="password" minlength="5" placeholder="Mot de passe" >
            <i class="fa fa-eye" id="seepassword"></i>
            <i class="fa fa-eye-slash" id="hidepassword"></i>
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error message</small>
        </div>

        <div class="f-control ">
            <label>Confirmer votre mot de passe</label>
            <input type="password" class="password" id="passwordcheck" minlength="5" placeholder="Confirmez votre mot de passe">
            <i class="fa fa-eye" id="seepasswordcheck"></i>
            <i class="fa fa-eye-slash" id="hidepasswordcheck"></i>
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error message</small>
        </div>
    </div>

    <button type="submit" class="btn btnvalidation rounded-pill">Créer mon compte</button>
</form>



<?php 
    include("inc/footerlinks.php");
    
?>


