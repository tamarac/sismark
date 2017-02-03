<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formacao;

class FormacaoController extends Controller
{
	public function index() {

		$formacao = Formacao::orderBy('nome_instituicao')->get();
		$msg = 0;
		return view('formacao.index', ['formacao'=> $formacao, 'msg' => $msg]);
	}
	public function cadastro() {
		$msg = 0;
		return view('formacao.cadastro',['msg' => $msg]);
	}
	public function create(Request $request) {
		$formacao = new Formacao;
		$formacao->nome_instituicao = $request->nome_instituicao;
		$formacao->curso = $request->curso;
		$formacao->cursando = $request->cursando;
		$formacao->ano_saida = $request->ano_saida;
		$formacao->ano_entrada = $request->ano_entrada;
		$formacao->save();
		$msg =  1;
		$f2 = Formacao::orderBy('id')->get();
		return view('formacao.index',['msg' => $msg, 'formacao' => $f2]);
	}
	public function edit($id) {
		$formacao = Formacao::find($id);
		$msg = 0;
		return view('formacao.editar', ['msg' => $msg, 'formacao' => $formacao]);

	}
	public function update(Request $request, $id){
		$formacao = Formacao::find($id);
		$formacao->nome_instituicao = $request->nome_instituicao;
		$formacao->curso = $request->curso;
		$formacao->cursando = $request->cursando;
		$formacao->ano_saida = $request->ano_saida;
		$formacao->ano_entrada = $request->ano_entrada;
		$formacao->save();
		$msg = 1;

		return view('formacao.editar', ['msg' => $msg, 'formacao' => $formacao]);
	}
	public function destroy($id){
		$formacao = Formacao::find($id);
		$formacao->delete();
		$f2 = Formacao::orderBy('nome_instituicao')->get();
		$msg = 2;
		return view('formacao.index',['formacao' => $f2, 'msg' => $msg]);
	}

}
