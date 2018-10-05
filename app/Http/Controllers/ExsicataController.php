<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Epiteto;
use App\Exsicata;
use App\Familia;
use App\Genero;
use Illuminate\Http\Request;

class ExsicataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exsicatas = Exsicata::orderBy('name', 'asc')->paginate(10);
        return view('exsicatas.index', compact('exsicatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genero::orderBy('name', 'asc')->get();
        $familias = Familia::orderBy('name', 'asc')->get();
        $epitetos = Epiteto::orderBy('name', 'asc')->get();
        return view('exsicatas.create', compact('generos', 'familias', 'epitetos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->all();
        $exsicata = Exsicata::create($dataForm);
        Endereco::create($dataForm + ['exsicata_id' => $exsicata->id]);
        return redirect()->route('exsicatas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exsicata = Exsicata::find($id);
        return view('exsicatas.show', compact('exsicata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exsicata = Exsicata::find($id);
        $generos = Genero::orderBy('name', 'asc')->get();
        $familias = Familia::orderBy('name', 'asc')->get();
        $epitetos = Epiteto::orderBy('name', 'asc')->get();
        return view('exsicatas.edit', compact('exsicata', 'generos', 'familias', 'epitetos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exsicata::find($id)->delete();
    }
}
