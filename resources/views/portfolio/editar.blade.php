@extends('layouts.app')
@section('content')
  <!-- Bootstrap Boilerplate... -->
<link rel="stylesheet" href="/css/app.css">
 
    <div class="panel-body">
        <div class="container">
            <!-- New Task Form -->
            @if ($msg == 1)
                <div class="alert alert-success"> Portfolio alterada!</div>
            @endif

            <div class="tabbable"> <!-- Only required for left/right tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Informações</a></li>
                    <li><a href="#tab2" data-toggle="tab">Imagens</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                      <form action="/portfolio/update/{{$portfolio->id}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <!-- Task Name -->
                        <div class="form-group">
                           
                                <label for="name" class="col-sm-1 control-label">Nome:</label>

                                <div class="col-sm-5">
                                    <input type="text" name="name" id="name" class="form-control" value="{{$portfolio->name}}">   
                                </div> 
                                <label for="name2" class="col-sm-2 control-label">Nome secundário:</label>

                                <div class="col-sm-4">
                                    <input type="text" name="name2" id="name2" class="form-control" value="{{$portfolio->name2}}">   
                                </div>     
                         
                      
                                <label for="linksite" class="col-sm-2 control-label">Link do site:</label>

                                <div class="col-sm-4">
                                    <input type="text" name="linksite" id="linksite" class="form-control" value="{{$portfolio->linksite}}">   
                                </div>                                       
                                <label for="category" class="col-sm-2 control-label">Categoria:</label>

                                <div class="col-sm-4">
                                    <input type="text" name="category" id="category" class="form-control" value="{{$portfolio->category}}">   
                                </div>
                        
                                 <label for="description" class="col-sm-2 control-label">Descrição:</label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$portfolio->description}}</textarea>
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
                <div class="tab-pane" id="tab2">
                    <form action="/portfolio/updatePhoto/{{$portfolio->id}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-sm-6">
                        <label for="foto" class="col-sm-2 control-label">Envie aqui sua imagem:</label>
                        <input type="hidden" name="id" id="id" value="{{$portfolio->id}}">
                            <input type="file" name="photo" id="foto">
                            <button type="submit" class="btn btn-default">ENVIAR IMAGEM</button>
                        </div>
                        <div class="col-sm-6">
                            <ul class="images">

                                @foreach($fotos as $item)
                                    <li><img src="{{asset(str_replace('public','storage', $item)) }}" alt="" width="160"><br>
                                        <form action="/portfolio/deletarImagem/{{$portfolio->id}}">
                                            <input type="hidden" name="photo" value="$item">
                                            <input type="submit" value="Excluir" class="btn btn-danger btn-mini">
                                        </form>
                                        </li>

                                @endforeach
                             
                            </ul>
                            
                        </div>    
                    </form>
               </div>
            </div>
        </div>
     </div>          

    <!-- TODO: Current Tasks -->
@endsection