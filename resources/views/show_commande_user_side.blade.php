
@extends('layouts.app')


@section('content')
<div class="content">
        <div class="title m-b-md">
            <h1> {{ session('msg') }}</h1>

          <br>
<h1> La liste de vos Commandes </h1>
<table class="table" style="font-size:16px ">
  <thead>
          <tr> 
            <th>N° Commande </th>
            <th>
             Type d'articles
            </th>
            <th>
             Quantités
            </th>
            <th>Modéles</th>
            <th>
              Références
            </th>
            <th>
                état
            </th>
            <th>
            Action 
            </th>
          
          </tr>
  </thead>
  <tbody>      
        @foreach ($users as $item)
       <tr>
       
       <td> {{ $item->id }} </td>
       <td> {{ $item->products->type }}</td>
       <td> {{ $item->quantite }}</td>
       <td><ul>        
        @foreach ($item->modeles as $i)
     <li>   {{ $i->name }} </li>
        @endforeach
    </ul>
</td>
       <td> <ul>        
        @foreach ($item->refs as $i)
     <li>   {{ $i->name }} </li>
        @endforeach
    </ul> </td>

<td> {{ $item->etat }}</td>
    @if( $item->etat == "en cours")
        <td> 
            <form action="{{ route('commande.destroy',$item->id) }}" method="POST">
                      @csrf 
                      @method('delete')
                      <button class="btn btn-danger"> Supprimer </button>
                
                    </form>
                </td>
     @else
                <td> - </td>

     @endif
        
       </tr>
        @endforeach
      </tbody>

</table>  
        </div>
</div>    
    
@endsection
<script>
    var v= "{{ session('msg') }}";
  if(v.length > 1 ){
    alert(v);
  }
</script>