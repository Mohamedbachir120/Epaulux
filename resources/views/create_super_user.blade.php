
@extends('layouts.app')

@section('content')
<h1> <a href="/"> home</a>   </h1>
<div class="wrapper create equipe">
        <h3 style="margin-left:30%;"> {{ session('error') }} </h3>

<h1 style="margin-left:30%;"> Créer un Administrateur </h1>
<form method="post" id="myform" action="/store_user">
    @csrf 
 <fieldset>   
     <legend> Informations personnelles </legend>
<label for="name"> Nom</label>  
<input name="name" required="true" type="text" placeholder="Nom"/>
<label for="prenom"> Prénom </label>
<input name="prenom" required="true" type="text"  placeholder="Prénom"/>
<label for="phone_number"> Numéro de Téléphone</label>
<input name="phone_number" required="true" type="tel" pattern="[0-9]{10,}" placeholder="Numéro de téléphone"/>
<label for="adresse"> Adresse</label>
<input type="text" name="adresse"  placeholder="adresse" required>
<label for="email"> email</label>
<input type="email" name="email" id="email" placeholder="email" required>
 </fieldset>
 <fieldset>
     <legend>Compte</legend>
<label for="username">Username </label>
<input name="username" required="true" type="text"  placeholder="Username"/>
<label for="password"> Mot de passe</label>
<input type="password" name="password" id="password" placeholder="password" required>
 </fieldset>
<input type="submit" class="btn btn-success" value="valider">
</form>
</div>

    @endsection

    