@extends('layouts.app')
@section('content')

  <!-- Bootstrap Boilerplate... -->
<link rel="stylesheet" href="/css/app.css">
    <div class="panel-body">
        <div class="container">
            <!-- New Task Form -->
              @if ($msg == 1)
                    <div class="alert alert-success"> Formação alterada!</div>
              @endif
            <form action="/formacao/update/{{$formacao->id}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <!-- Task Name -->
                <div class="form-group">
                    <label for="nome_instituicao" class="col-sm-3 control-label">Nome da instituição:</label>

                    <div class="col-sm-6">
                        <input type="text" name="nome_instituicao" id="nome_instituicao" class="form-control" value="{{$formacao->nome_instituicao}}">   
                    </div> 
                    <label for="curso" class="col-sm-3 control-label">Curso:</label>

                    <div class="col-sm-6">
                        <input type="text" name="curso" id="curso" class="form-control" value="{{$formacao->curso}}">   
                    </div>       
                    <label for="ano_entrada" class="col-sm-3 control-label">Ano de entrada:</label>

                    <div class="col-sm-6">
                        <input type="text" name="ano_entrada" id="ano_entrada" class="form-control" value="{{$formacao->ano_entrada}}">   
                    </div>                    
                    <label for="ano_saida" class="col-sm-3 control-label">Ano de Saída:</label>

                    <div class="col-sm-6">
                        <input type="text" name="ano_saida" id="ano_saida" class="form-control" value="{{$formacao->ano_saida}}">   
                    </div>
                    <label for="cursando" class="col-sm-3 control-label">Ainda cursando?</label>

                    <div class="col-sm-6">
                        <select name="cursando" id="cursando">
                            <option value="1" <?if $formacao->cursando == 1: ?> Selected <? endif ?>>Sim</option>                            
                            <option value="0" <?if $formacao->cursando == 0: ?> Selected <? endif ?>>Não</option>
                        </select> 
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-edit"></i> Salvar Formação
                        </button>
                    </div>
                </div>
            </form>
        </div>    
    </div>

    <!-- TODO: Current Tasks -->
@endsection