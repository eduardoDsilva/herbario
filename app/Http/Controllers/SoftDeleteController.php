<?php

namespace App\Http\Controllers;

use App\Epiteto;
use App\Exsicata;
use App\Familia;
use App\Genero;

class SoftDeleteController extends Controller
{

    public function index()
    {
        return view('configuration.soft-delete.index');
    }

    public function exsicatas()
    {
        $tipo = "Exsicatas";
        $datas = Exsicata::onlyTrashed()->get();
        return view('configuration.soft-delete.table', compact('tipo', 'datas'));
    }

    public function epitetos()
    {
        $tipo = "Epitetos";
        $datas = Epiteto::onlyTrashed()->get();
        return view('configuration.soft-delete.table', compact('tipo', 'datas'));
    }

    public function familias()
    {
        $tipo = "Famílias";
        $datas = Familia::onlyTrashed()->get();
        return view('configuration.soft-delete.table', compact('tipo', 'datas'));
    }

    public function generos()
    {
        $tipo = "Generos";
        $datas = Genero::onlyTrashed()->get();
        return view('configuration.soft-delete.table', compact('tipo', 'datas'));
    }

}
