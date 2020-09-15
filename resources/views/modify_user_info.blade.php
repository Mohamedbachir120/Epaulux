
@extends('layouts.app')

@section('content')
<h1> <a href="/"> home</a>   </h1>
<div class="wrapper create equipe">
        <h3 style="margin-left:30%;"> {{ session('error') }} </h3>
<div style="margin-left:30%; ">

      
         <p style="font-size: 25px;"> les informations courantes </p>   
        <ul>
            <li>Nom : {{ $m->name }}</li>
        <li> Prénom : {{ $m->prenom }}</li>
        <li> Numéro de téléphone : {{ $m->phone_number }}</li>
        <li> Adresse : {{  $m->adresse }}</li>
        <li> email :{{ $m->email }} </li>
        <li>Derniére modification était le {{ $m->updated_at }}</li>
        </ul>
        <button onclick="myfunction()" class="btn btn-primary"> Modifier mes infos </button>
</div>
<div id="change" style="display: none;">
<h1 style="margin-left:30%;"> Modifier mes informations personnelles </h1>
<form method="post" id="myform" action="/update_user/{{ $m->id }}">
    @csrf 
<label for="name"> Nom</label>  
<input name="name" required="true" type="text" placeholder="Nom" value="{{ $m->name }}"/>
<label for="prenom"> Prénom </label>
<input name="prenom" required="true" type="text"  placeholder="Prénom" value="{{ $m->prenom }}"/>
<label for="phone_number"> Numéro de Téléphone</label>
<input name="phone_number" required="true" type="tel" pattern="[0-9]{10,}" value="{{ $m->phone_number }}" placeholder="Numéro de téléphone"/>
<label for="adresse"> Adresse</label>
<input type="text" name="adresse"  placeholder="adresse"  value="{{ $m->adresse }}" required>
<label for="email"> email</label>
<input type="email" name="email" id="email" placeholder="email"  value="{{ $m->email }}" required>

<input type="submit" class="btn btn-success" value="valider">
    
</form>
<button onclick="myfunction2()" class="btn btn-danger" style="margin-left: 30%"> Annuler </button>

</div>
</div>

    @endsection
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   
<script>
    
    function myfunction(){
        $('#change').show();

    }
    function myfunction2(){
        $('#change').hide();

    }
    var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }
    
    </script>    