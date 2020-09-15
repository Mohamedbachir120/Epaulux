@extends('layouts.app')

@section('content')
@php 
echo "<h1>hello world using simple php</h1>";
echo $name;
@endphp

<div class="flex-center position-ref full-height">
    
    @foreach ($details as $item)
    
     
  <div class="links">
        
    <a href="/detail/{{ $item->id }}"> {{ $item->name }}    <br> </a> 
       
   
</div>
    @endforeach

    

                </div>

@endsection
