
@extends('layouts.app')

@section('content')
<h1> <a href="/"> home</a>   </h1>
<div class="wrapper create equipe">
<h1 style="margin-left:30%;"> create new team </h1>
<form method="post" id="myform" action="/store">
    @csrf 
<label for="name"> Team name</label>  
<input name="name" required="true" type="text" placeholder="team name"/>
<label for="manager"> Manager </label>
<input name="manager" required="true" type="text"  placeholder="team manager"/>
<label for="title"> titre </label>
<input name="title" required="true" type="text"  placeholder="competition"/>
<label for="number"> number</label>
<input name="number" required="true" type="number"  placeholder="title "/>

<fieldset aria-required="true">
    <label > Choose the players of the team </label>
    <input type="checkbox" name="players[]"  value="Mahrez" id=""> Mahrez<br/>
    <input type="checkbox" name="players[]" value="Messi" id=""> Messi<br/>
    <input type="checkbox" name="players[]" value="Ronaldo" id=""> Ronaldo<br/>
    <input type="checkbox" name="players[]" value="Ibrahimovic" id=""> Ibrahimovic <br>
    
</fieldset>
<input type="submit" value="valider">

</form>
</div>

    @endsection
