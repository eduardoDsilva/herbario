<?php

namespace App\Http\Controllers;

use App\Epiteto;
use App\Exsicata;
use App\Familia;
use App\Genero;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exsicatas = count(Exsicata::all());
        $epitetos = count(Epiteto::all());
        $familias = count(Familia::all());
        $generos = count(Genero::all());
        return view('welcome', compact('familias', 'generos', 'epitetos', 'exsicatas'));
    }

    public function sobre(){
        return view('sobre');
    }

}
