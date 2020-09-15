
@extends('layouts.app')

@section('content')
<h1> <a href="/home"> home</a>   </h1>
<div class="wrapper create equipe">
        <h3 style="margin-left:30%;"> {{ session('error') }} </h3>

<h1 style="margin-left:30%;"> Modifier un Modéle </h1>
<form method="post" id="myform" action="/update_modele/{{ $id }}"  enctype="multipart/form-data">
    @csrf 

<label for="name"> Nom du modéle</label>  
<input type="text" name="name" placeholder="Nom du Modéle" value="{{ $m->name }}">
<label for="prix_unitaire"> Prix Unitaire</label>
<input type="number" name="prix_unitaire"  placeholder="Prix Unitaire" value="{{ $m->prix_unitaire }}" required>
<label for="prix_ugros"> Prix Unitaire Gros</label>
<input type="number" name="prix_ugros"  placeholder="Prix Unitaire Gros" value="{{ $m->prix_ugros }}" required>
<label for="prix_gros"> Prix Gros</label>
<input type="number" name="prix_gros"  placeholder="Prix  Gros" value="{{ $m->prix_gros }}" required>
<label for="prix_paquets"> Prix paquets</label>
<input type="number" name="prix_paquets"  placeholder="Prix paquets" value="{{ $m->prix_paquets }}" required>
<label for="prix_fardeau"> Prix Fardeau</label>
<input type="number" name="prix_fardeau"  placeholder="Prix fardeau" value="{{ $m->prix_fardeau }}" required>
<label for="paire"> Nombre de paire</label>
<input type="number" name="paire"  placeholder="Nombre de paires" value="{{ $m->paire }}" required>

<input type="submit" value="valider" class="btn btn-success">

</form>
</div>

    @endsection

    
    