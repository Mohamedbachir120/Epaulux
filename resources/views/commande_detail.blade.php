
@extends('layouts.app')


@section('content')
<div class="content">
        <div class="title m-b-md">
            <h1> {{ session('msg') }}</h1>

            <div class="products">
                
                 <h3>   Votre facture </h3>
                <table class="table">
                   
                    <thead class="thead-dark">
                    <th> prix unitaire</th>
                    <th> prix gros </th>
                    <th> prix unitaire gros</th>
                    <th> prix paquets </th>
                    <th> prix fardeau</th>   
                    <th> prix totale </th>
                    </thead>
                    <tbody>
                @foreach ($table as $item =>$value )
                    <td>
                        {{ $value }} .00 DA
                    </td>
                @endforeach 
                <td>
                    {{ $totale }} .00 DA
                </td>
                    </tbody>
                </table>
  
                consulter votre facture en format pdf en cliquant ici<a class="btn btn-primary" href="/facture/pdf/{{ $object->id }}">Export to PDF</a>
       </div>
        </div>
</div>    
    
<style>

    td,th{
        border:1px black solid;
    }
</style>
@endsection