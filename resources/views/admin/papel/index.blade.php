@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="center">Lista de Papéis</h3>

    @include('admin._caminho')
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{$registro->id}}</td>
                        <td>{{$registro->nome}}</td>
                        <td>{{$registro->descricao}}</td>
                        <td>
                           <form action="{{route('papeis.destroy', $registro->id)}}" method="post">
                            @can('papel-edit')   
                                <a title="Editar" href="{{route('papeis.edit', $registro->id)}}" class="btn orange">
                                   <i class="material-icons">mode_edit</i>
                               </a>
                            @endcan
                            @can('papel-delete')
                               <a title="Permissões" href="{{route('papeis.permissao',$registro->id)}}" class="btn blue">
                                   <i class="material-icons">lock_outline</i>
                               </a>

                               {{method_field('DELETE')}}
                               {{csrf_field()}}
                               <button title="Deletar" class="btn red"><i class="material-icons">delete</i></button>
                            @endcan
                           </form> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
    @can('papel-create')
        <a href="{{route('papeis.create')}}" class="btn blue">Adicionar</a>
    @endcan
    </div>
</div>
@endsection