
@extends('layouts.app')


@section('content')
<div class="content">
        <div class="title m-b-md">
            <h1> {{ session('msg') }}</h1>

          {{ $m->name }} -- {{ $m->title }} -- {{ $m->manager }} -- {{ $m->number }} 
          <br>
        @foreach ($m->players as $item)
        {{ $item }}    
        @endforeach

        <form action="{{ route('article.destroy',$m->id) }}" method="POST">
          @csrf 
          @method('delete')
          <button> Delete  </button>
        
        </form>
        </div>
</div>    
    
@endsection