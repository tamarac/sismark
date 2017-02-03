<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Formacao;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::orderBy('name')->get();        
        $formacao = Formacao::orderBy('ano_saida','desc')->get();
        return view('welcome',['portfolio' => $portfolio, 'formacao' => $formacao]);
    }
}
