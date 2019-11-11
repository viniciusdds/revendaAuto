@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            @can('view',$chamado)
                <div class="form-group">
                     <h2>Detalhe de Chamados</h2>

                     Título: {{$chamado->titulo}}
                </div>
            @else
                <div class='alert alert-danger error'><b>Erro: </b> Você não tem permissão para acessar esse registro!</div>
            @endcan
    </div>
</div>
@endsection