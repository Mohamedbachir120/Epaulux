
@extends('layouts.app')

@section('content')
<h1> <a href="/home"> home</a>   </h1>
<div class="wrapper create equipe">
        <h3 style="margin-left:30%;"> {{ session('error') }} </h3>

<h1 style="margin-left:30%;"> Modifier un Produits </h1>
<form method="post" id="myform" action="/update_products/{{ $id }}"  enctype="multipart/form-data">
    @csrf 
    <label for="type"> Type</label>  
    <select name="type" required="true"  placeholder="Type">
    <option value="Epaulettes">Epaulettes</option>
    <option value="Bordures">Bordures</option>
    <option value="Galons en rayonne">Galons en rayonne</option>
    <option value="ZIGZAG">ZIGZAG</option>
    <option value="Cordon 100% RAyonne"> Cordon 100% RAyonne</option>
    <option value="Macrame"> Macrame</option>
    <option value="Bande de Survetement">Bande de Survetement</option>
    <option value="Fermeture éclairs">Fermeture éclairs</option>
    <option value="Déchets"> Déchets</option>
    <option value="Cigare Veste">Cigare Veste</option>
    <option value="Lacets">Lacets</option>
    <option value="Sangles">Sangles</option>
    <option value="Fil à Crochet"> Fil à Crochet</option>
    <option value="Boutons">Boutons</option>
    </select>
    <label for="couleur"> Couleur </label>
<input name="couleur" required="true" type="text"  placeholder="couleur" value="{{ $m->couleur }}"/>
<label for="ref"> Référence</label>
<select  name="ref"  placeholder="Référence" multiple required>
    @foreach ($refs as $modele)
    <option value="{{ $modele->id }}"> {{ $modele->name }}</option>
    @endforeach


<label for="model"> Modéle</label>
<select  name="model"  placeholder="Modéle" multiple required>
    @foreach ($modeles as $modele)
    <option value="{{ $modele->id }}"> {{ $modele->name }}</option>
    @endforeach
    <label for="contenu"> Image</label>
<img src="/images/{{ $m->contenu }}" alt="" width="200px" height="100px">
<input type="file"  name="contenu"  placeholder="contenu" required>

 
<input type="submit" value="valider" class="btn btn-success">

</form>
</div>

    @endsection

    
    