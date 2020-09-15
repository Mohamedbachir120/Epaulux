
@extends('layouts.app')


@section('content')
<div class="content">
        <div class="title m-b-md">
            <h1> {{ session('msg') }}</h1>

            <div class="products">
    <ul>
    <img src="/images/{{ $m->contenu }}" width="300px" height="200px">
    <li> ID :{{ $m->id }}</li>
    <li> Type: {{ $m->type }}  
    </li>
<li> Modéle : 
    @foreach($m->modeles as $category)
    <li style="border: 2px black solid; max-width: 400px; margin-left: 33%;"> <ul>
        <li> Nom: {{ $category->name }} </li>
      @if( $category->paire !="")  <li>Nombre de paire :{{ $category->paire}} </li> @endif
      @if( $category->prix_unitaire !="")  <li> Prix unitaire : {{ $category->prix_unitaire }} DA</li> @endif
        @if( $category->prix_gros !="") <li> Prix Gros : {{ $category->prix_gros }} DA</li> @endif
         @if( $category->prix_ugros !="")    <li> Prix Unitaire Gros : {{ $category->prix_ugros }} DA</li> @endif
        
        @if( $category->prix_paquets !="")    <li> Prix paquets : {{ $category->prix_paquets }} DA</li> @endif
            
          @if( $category->prix_fardeau !="") <li> Prix Fardeau : {{ $category->prix_fardeau }} DA</li> @endif
            </ul>
        </li>
    @endforeach
    </li>
 <li> Références : 
    @foreach($m->refs as $category)
    <li style="border: 2px black solid; max-width: 400px; margin-left: 33%;"> <ul>
        <li> Nom: {{ $category->name }} </li>
      @if( $category->paire !="")  <li>Nombre de paire :{{ $category->paire}} </li> @endif
      @if( $category->prix_unitaire !="")  <li> Prix unitaire : {{ $category->prix_unitaire }} DA</li> @endif
        @if( $category->prix_gros !="") <li> Prix Gros : {{ $category->prix_gros }} DA</li> @endif
         @if( $category->prix_ugros !="")    <li> Prix Unitaire Gros : {{ $category->prix_ugros }} DA</li> @endif
        
        @if( $category->prix_paquets !="")    <li> Prix paquets : {{ $category->prix_paquets }} DA</li> @endif
            
          @if( $category->prix_fardeau !="") <li> Prix Fardeau : {{ $category->prix_fardeau }} DA</li> @endif
            </ul>
        </li>
    @endforeach
    </li>
<li> Couleur : {{ $m->couleur }}</li>
      @auth
    @if( Auth::user()->type_compte == "admin" )

<li> Date de Création : {{ $m->created_at }}</li>
<li> Date de Derniére modification {{ $m->updated_at }}</li>
    <li></li>
    </ul>         
  
<form action="{{ route('products.destroy',$m->id) }}" method="POST">
          @csrf 
          @method('delete')
          <button class="btn btn-danger"> Supprimer </button>
    
        </form>
        
        <form action="{{ route('modify_products',$m->id) }}" method="GET">
            @csrf 
            @method('get')
            <button class="btn btn-primary"> Modifier </button>
      
          </form>
  
          @endif
     @endauth
       </div>
        </div>
</div>    
    
@endsection