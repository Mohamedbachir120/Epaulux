
@extends('layouts.app')


@section('content')
<div class="content">
        <div class="title m-b-md">
            <h1> {{ session('msg') }}</h1>

          <br>
<h1> La liste de vos Modéles </h1>
<div class="grid-container" >
       @foreach ($users as $category)
    
    <div class="grid-item" >   


        <ul style="font-size:16px ">
            <a href="/detail_modele/{{ $category->id }}"> <li> Modéle: {{ $category->name }} </li> </a>
            <li>Nombre de paire :{{ $category->paire}} </li>
            <li> Prix unitaire : {{ $category->prix_unitaire }} DA</li>
            <li> Prix Gros : {{ $category->prix_gros }} DA</li>
            <li> Prix Unitaire Gros : {{ $category->prix_ugros }} DA</li>
            
            <li> Prix paquets : {{ $category->prix_paquets }} DA</li>
                
            <li> Prix Fardeau : {{ $category->prix_fardeau }} DA</li>
                </ul>
    </div>
        
       </tr>
        @endforeach
    
      </div>
        </div>
</div>    
    
@endsection