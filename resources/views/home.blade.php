@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">        
        <div class="form-group">
        <h2>Lista de Chamados</h2>

            @forelse($chamados as $key => $value)
                    <p>{{$value->titulo}} 
                @can('ver-chamado',$value)    
                    <a href="/home/{{$value->id}}">Editar</a>
                @endcan
                    </p> 
            @empty 
                <p>Não existem chamados!</p>
            @endforelse
        </div>
       
    </div>
</div>
@endsection
