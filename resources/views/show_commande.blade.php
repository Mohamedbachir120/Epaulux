
@extends('layouts.app')


@section('content')
<div class="content">
        <div class="title m-b-md">
         

          <br>
        
<h1> La liste des Commandes reçus </h1>
<div class="grid-container" >
       @foreach ($users as $item)
    
    <div class="grid-item" > 
    
    <ul style="font-size:16px ">
        <legend> Commande N° {{ $item->id }}</legend>
        <li>
            Date: {{ $item->created_at }}
        </li>
        <li>
         Nom   d'utilisateur:{{ $item->user->name }}
        </li>
        <li>
            Numéro   de Téléphone :{{ $item->user->phone_number }}
        </li>
        <li>
            Article: {{ $item->products->type }}

        </li>

        <li>
            Modéle:
            <ul> 
            
            @foreach ($item->modeles as $i)
            {{ $i->name }}
            @endforeach
        </ul>
            
        </li>
        <li>
            Références:
            <ul> 
            
            @foreach ($item->refs as $i)
            {{ $i->name }}
            @endforeach
        </ul>
            
        </li>
        <li>
            Quantité :{{ $item->quantite }}

        </li>
        <li>
            état: {{ $item->etat }} 
        </li>
    </ul>
    
    
    
    <a href="/commande_detail/{{ $item->id }}" class="btn btn-primary"  style="margin-bottom:2%;"> Consulter la facture</a>
    
        <a  class="btn btn-success "href="/modify_commande/{{ $item->id }}"> 
        Traiter la commande
    </a>
    </div>
        
       </tr>
        @endforeach
    
      </div>
        </div>
</div>    

    
@endsection


<script>
    var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }
</script>