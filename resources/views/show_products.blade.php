
@extends('layouts.app')


@section('content')
<div class="content">
        <div class="title m-b-md">
            <h1> {{ session('msg') }}</h1>

          <br>
<h1> La liste de vos Produits </h1>
<div class="grid-container" >
       @foreach ($users as $item)
    
    <div class="grid-item" >   <a href="/detail_products/{{ $item->id }}"> 
      <img src="/images/{{$item->contenu }}" >  
    </a>
    </div>
        
       </tr>
        @endforeach
       

    
      </div>
      {{ $users->links() }}
        </div>
</div>    
    
@endsection