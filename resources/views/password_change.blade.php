
@extends('layouts.app')

@section('content')



<h1> <a href="/"> home</a>

</h1>
<div class="wrapper create equipe">
        <h3 style="margin-left:30%;"> {{ session('error') }} </h3>

        @if(Auth::user()->type_compte == "simple")
<h1 style="margin-left:30%;"> Modifier mon mot de passe </h1>

<form method="post" id="myform" action="/password_update/{{$id}}">
    @csrf 
 <label for="old_password">Ancien Mot de passe</label>
<input type="password" name="old_password" id="password" placeholder="password" required>
      
<label for="new_password">Nouveau Mot de passe</label>
<input type="password" name="new_password" id="password" placeholder="password" required>

<input type="submit" class="btn btn-success" value="valider">
</form>

@else 
<h1 style="margin-left:30%;"> Modifier le mot de passe </h1>

<form method="post" id="myform" action="/password_update/{{$id}}">
    @csrf 
      
<label for="new_password">Nouveau Mot de passe</label>
<input type="password" name="new_password" id="password" placeholder="password" required>

<input type="submit" class="btn btn-success" value="valider">
</form>



@endif
</div>

    @endsection

    
<script >
    var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }
  </script>