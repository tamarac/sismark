@extends('layouts.app')
@section('content')

  <!-- Bootstrap Boilerplate... -->
<link rel="stylesheet" href="/css/app.css">
    <div class="panel-body">    
    	<div class="container">
        <!-- New Task Form -->
        <h2>Cadastrar um novo trabalho em seu Portfólio</h2>
	        <form action="/portfolio/create" method="POST" class="form-horizontal">
	            {{ csrf_field() }}
	            <!-- Task Name -->
	          <div class="form-group">
                    <div class="col-sm-12">
                        <label for="name" class="col-sm-1 control-label">Nome:</label>

                        <div class="col-sm-5">
                            <input type="text" name="name" id="name" class="form-control">   
                        </div> 
                        <label for="name2" class="col-sm-2 control-label">Nome secundário:</label>

                        <div class="col-sm-4">
                            <input type="text" name="name2" id="name2" class="form-control">   
                        </div>     
                    </div>
                    <div class="col-sm-12">
                        <label for="linksite" class="col-sm-2 control-label">Link do site:</label>

                        <div class="col-sm-4">
                            <input type="text" name="linksite" id="linksite" class="form-control">   
                        </div>                                       
                        <label for="category" class="col-sm-1 control-label">Categoria:</label>

                        <div class="col-sm-5">
                            <input type="text" name="category" id="category" class="form-control">   
                        </div>
                    </div>
                    <div class="col-sm-12">
                         <label for="description" class="col-sm-1 control-label">Descrição:</label>
                        <div class="col-sm-11">
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

	            <!-- Add Task Button -->
	            <div class="form-group">
	                <div class=" col-sm-6">
	                    <button type="submit" class="btn btn-default">
	                       Cadastrar
	                    </button>
	                </div>
	            </div>
	        </form>
    	</div>    
	</div>

    <!-- TODO: Current Tasks -->
@endsection