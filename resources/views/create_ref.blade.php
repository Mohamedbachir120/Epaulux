
@extends('layouts.app')

@section('content')
<h1> <a href="/"> home</a>   </h1>
<div class="wrapper create equipe">
        <h3 style="margin-left:30%;"> {{ session('error') }} </h3>

<h1 style="margin-left:30%;"> Ajouter une Référence </h1>
<form method="post" id="myform" action="/store_ref" enctype="multipart/form-data">
    @csrf 
<label for="name"> Nom du modéle</label>  
<input type="text" name="name" placeholder="Nom du Modéle">
<label for="prix_unitaire"> Prix Unitaire</label>
<input type="number" name="prix_unitaire"  placeholder="Prix Unitaire" >
<label for="prix_ugros"> Prix Unitaire Gros</label>
<input type="number" name="prix_ugros"  placeholder="Prix Unitaire Gros" >
<label for="prix_gros"> Prix Gros</label>
<input type="number" name="prix_gros"  placeholder="Prix  Gros" >
<label for="prix_paquets"> Prix paquets</label>
<input type="number" name="prix_paquets"  placeholder="Prix paquets" >
<label for="prix_fardeau"> Prix Fardeau</label>
<input type="number" name="prix_fardeau"  placeholder="Prix fardeau" >
<label for="paire"> Nombre de paire</label>
<input type="number" name="paire"  placeholder="Nombre de paires" >

 
<input type="submit" value="valider" class="btn btn-success">

</form>
</div>

    @endsection

    
    