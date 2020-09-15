
@extends('layouts.app')


@section('content')
<div class="content">
        <div class="title m-b-md">
            <h1> {{ session('msg') }}</h1>

            <div class="products">
    <ul>
        <li> Nom: {{ $m->name }} </li>
        <li>Nombre de paire :{{ $m->paire}} </li>
        <li> Prix unitaire : {{ $m->prix_unitaire }} DA</li>
        <li> Prix Gros : {{ $m->prix_gros }} DA</li>
        <li> Prix Unitaire Gros : {{ $m->prix_ugros }} DA</li>
        
        <li> Prix paquets : {{ $m->prix_paquets }} DA</li>
            
        <li> Prix Fardeau : {{ $m->prix_fardeau }} DA</li>
   
    

<li> Date de Création : {{ $m->created_at }}</li>
<li> Date de Derniére modification {{ $m->updated_at }}</li>
 
    </ul>         
<form action="{{ route('ref.destroy',$m->id) }}" method="POST">
          @csrf 
          @method('delete')
          <button class="btn btn-danger"> Supprimer </button>
    
        </form>
        
        <form action="{{ route('modify_ref',$m->id) }}" method="GET">
            @csrf 
            @method('get')
            <button class="btn btn-primary"> Modifier </button>
      
          </form>
  
       
       </div>
        </div>
</div>    
    
@endsection