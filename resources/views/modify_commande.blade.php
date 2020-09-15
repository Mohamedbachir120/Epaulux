
@extends('layouts.app')

@section('content')
<h1> <a href="/home"> home</a>   </h1>
<div class="wrapper create equipe">
        <h3 style="margin-left:30%;"> {{ session('error') }} </h3>

<h1 style="margin-left:30%;"> Traiter une Commande </h1>
<form method="post" id="myform" action="/update_commande/{{ $id }}"  enctype="multipart/form-data">
    @csrf 


<label for="etat">Répondre :</label>

<select name="etat" id="">
    <option value="en cours"> en cours</option>
    <option value="achat accordé"> achat accordé</option>
    <option value="achat non accordé"> achat non accordé</option>
</select>

<input type="submit" value="valider" class="btn btn-success">

</form>
</div>

    @endsection

    
    