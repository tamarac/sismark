@extends('layouts.app')
@section('content')

  <!-- Bootstrap Boilerplate... -->
<link rel="stylesheet" href="/css/app.css">
    <div class="panel-body">    
        <div class="container">
             @if ($msg == 1)
                <div class="alert alert-success"> Portfolio Criado!</div>
            @endif
               @if ($msg == 2)
                <div class="alert alert-danger"> Portfolio Deletado!</div>
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
                @foreach ($portfolio as $item)
                    <tr>
                        <td> {{$item->id}}</td> 
                        <td> {{$item->name}}</td> 
                        <td><a href="/portfolio/editar/{{$item->id}}" class="btn btn-primary">Editar</a></td>
                        <td>
                            <form action="/portfolio/delete/{{$item->id}}" method="post">
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