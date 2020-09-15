
@extends('layouts.app')


@section('content')
<div class="content">
        <div class="title m-b-md">
            <h1> {{ session('msg') }}</h1>

          <br>
<h1> La liste de vos utilisateurs </h1>
<table class="table" style="font-size:16px ">
  <thead>
          <tr> 
            <th>Action 1 </th>
            <th> Action 2</th>
            <th>Username </th>
            <th>
              Nom
            </th>
            <th>
              Prénom
            </th>
            <th> Numéro de Téléphone</th>
            <th>
              Adresse
            </th>
            <th>
              Email
            </th>
            <th> Date d'inscription</th>
          </tr>
  </thead>
  <tbody>      

        @foreach ($users as $item)
    
        <tr>
          @if($item->type_compte == "simple")
          <td>  
            <form action="{{ route('user.destroy',$item->id) }}" method="POST">
                      @csrf 
                      @method('delete')
                      <button class="btn btn-danger"> Supprimer </button>
                
                    </form>
          </td>

<td>
  <a href="/password_change/{{ $item->id }}" class="btn btn-primary"> Modifier mot de passe</a>

                    
                    </td>

                    @else
                    <td> - </td>
                    <td> - </td>
                    @endif
       <td> {{ $item->username }}</td>
       <td> {{ $item->name }}</td>
       <td> {{ $item->prenom }} </td>
        <td> {{ $item->phone_number }} </td>
       <td>  {{ $item->adresse }} </td>
        <td>   {{ $item->email }} </td>
        <td> {{ $item->created_at }} </td>
        
        
       </tr>
        @endforeach
      </tbody>

</table>  
        </div>
</div>    
    
@endsection