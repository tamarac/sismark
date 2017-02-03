@extends('layouts.app')
@section('content')

  <!-- Bootstrap Boilerplate... -->
<link rel="stylesheet" href="/css/app.css">
    <div class="panel-body">    
        <div class="container">
            @if ($msg == 2)
                <div class="alert alert-danger"> Formação Deletado!</div>
            @endif
        <table class="table table-condensed">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Ações</td>
                </tr>        
            </thead>
            <tbody>
                @foreach ($formacao as $item)
                    <tr>
                        <td> {{$item->id}}</td> 
                        <td> {{$item->nome_instituicao}}</td> 
                        <td><a href="/formacao/editar/{{$item->id}}" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form action="/formacao/delete/{{$item->id}}" method="post">
                                {{ csrf_field() }}
                               <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-delete"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</div>
    <!-- TODO: Current Tasks -->
@endsection