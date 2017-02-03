@extends('layouts.app')
@section('content')

  <!-- Bootstrap Boilerplate... -->
<link rel="stylesheet" href="/css/app.css">
    <div class="panel-body">    
    	<div class="container">
        <!-- New Task Form -->
	        <form action="/formacao/create" method="POST" class="form-horizontal">
	            {{ csrf_field() }}
	            <!-- Task Name -->
	            <div class="form-group">
	               <div class="form-group">    
		               	<div class="col-sm-12">
		                    <label for="nome_instituicao" class="col-sm-3 control-label">Nome da instituição:</label>
	  						<div class="col-sm-4">
		                        <input type="text" name="nome_instituicao" id="nome_instituicao" class="form-control">   
		                    </div> 
		                    <label for="curso" class="col-sm-2 control-label">Curso:</label>

			                <div class="col-sm-3">
			                    <input type="text" name="curso" id="curso" class="form-control">   
			                </div>         
		                </div> 
	                    <div class="col-sm-12"> 
		                    <label for="ano_entrada" class="col-sm-3 control-label">Ano de entrada:</label>

		                    <div class="col-sm-3">
		                        <input type="text" name="ano_entrada" id="ano_entrada" class="form-control">   
		                    </div>                    
		                    <label for="ano_saida" class="col-sm-3 control-label">Ano de Saída:</label>

		                    <div class="col-sm-3">
		                        <input type="text" name="ano_saida" id="ano_saida" class="form-control">   
		                    </div>
	                    </div>
         				<div class="col-sm-12"> 
	                    	<label for="cursando" class="col-sm-3 control-label">Ainda Cursando?</label>

	                    	<div class="col-sm-6">
		                        <select name="cursando" id="cursando">
		                            <option value="">Selecione</option>                              
		                            <option value="1">Sim</option>                            
		                            <option value="0">Não</option>
		                        </select> 
	                    	</div>
	            		</div>	            
	        		</div>

	            <!-- Add Task Button -->
	            <div class="form-group">
	                <div class="col-sm-offset-3 col-sm-6">
	                    <button type="submit" class="btn btn-default">
	                        <i class="fa fa-plus"></i> Cadastrar formação
	                    </button>
	                </div>
	            </div>
	        </form>
    	</div>    
	</div>

    <!-- TODO: Current Tasks -->
@endsection