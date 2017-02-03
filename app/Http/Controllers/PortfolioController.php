<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Portfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
  public function index() {

   		$portfolio = Portfolio::orderBy('name')->get();
   		$msg = 0;
      return view('portfolio.index', ['portfolio' => $portfolio, 'msg' => $msg]);

	}
	public function cadastro() {

   		return view('portfolio.cadastro');
	}
	public function create(Request $request) {
		$portfolio = new Portfolio;
		$portfolio->name = $request->name;
		$portfolio->name2 = $request->name2;
		$portfolio->linksite = $request->linksite;
		$portfolio->category = $request->category;
		$portfolio->description = $request->description;
		$portfolio->save();
		$msg = 1;
		$p2 = Portfolio::orderBy('id')->get();
		return view('portfolio.index',['msg' => $msg,'portfolio' => $p2]);

	}
	public function edit($id){
 		$portfolio = Portfolio::find($id);
 		$pasta = 'public/imagens/portfolio/'. $id .'/';
		$files = Storage::files($pasta);      
 		$msg = 0;
 		return view('portfolio.editar',['msg' => $msg,'portfolio' => $portfolio, 'fotos' => $files]);
	}
	public function update(Request $request, $id) {
		$portfolio = Portfolio::find($id);
		$portfolio->name = $request->name;
		$portfolio->name2 = $request->name2;
		$portfolio->linksite = $request->linksite;
		$portfolio->category = $request->category;
		$portfolio->description = $request->description;
		$portfolio->save();
		$msg = 1;
		$pasta = 'public/imagens/portfolio/'. $id .'/';
		$files = Storage::files($pasta); 
		return view('portfolio.editar', ['msg' => $msg, 'portfolio' => $portfolio, 'fotos' => $files]);
	}	
	public function updatePhoto(Request $request, $id) {
		$path = 'public/imagens/portfolio/'. $id .'/';
	 	$photo = $request->file('photo')->store($path);
	 	$p2 = Portfolio::find($id);
	 	$msg = 2;
	 	$pasta = 'public/imagens/portfolio/'. $id .'/';
		$files = Storage::files($pasta);      
		return view('portfolio.editar', ['msg' => $msg, 'portfolio' => $p2, 'fotos' => $files]);
	}	
	public function deletePhoto(Request $request, $id) {
		$path = 'public/imagens/portfolio/'. $id .'/';
	 	$photo = $request->file('photo')->store($path);
	 	$p2 = Portfolio::find($id);
	 	$msg = 2;
		return view('portfolio.editar', ['msg' => $msg, 'portfolio' => $p2]);
	}
	public function destroy($id) {
		$portfolio = Portfolio::find($id);
		$portfolio->delete();
		$p2 = Portfolio::orderBy('name')->get();
		$msg = 2;
		return view('portfolio.index', ['portfolio' => $p2, 'msg' => $msg]);
	}
}
