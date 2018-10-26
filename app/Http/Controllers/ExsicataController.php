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
        $data = Exsicata::paginate(9);
        $table = true;
        return view('exsicatas.index', compact('data', 'table'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexGrade()
    {
        $data = Exsicata::paginate(9);
        $table = false;
        return view('exsicatas.index', compact('data', 'table'));
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
        $data = Exsicata::find($id);
        return view('exsicatas.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Exsicata::find($id);
        $generos = Genero::orderBy('name', 'asc')->get();
        $familias = Familia::orderBy('name', 'asc')->get();
        $epitetos = Epiteto::orderBy('name', 'asc')->get();
        return view('exsicatas.edit', compact('data', 'generos', 'familias', 'epitetos'));
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
    public function destroy(Request $request)
    {
        $dataForm = $request->all();
        Exsicata::find($dataForm['id'])->delete();
        Endereco::where('exsicata_id', '=', $dataForm['id'])->delete();
        return redirect()->back();
    }

    /**
     * Recovers a previously deleted record
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recovery($id)
    {
        Exsicata::withTrashed()->where('id', $id)->restore();
        Endereco::withTrashed()->where('exsicata_id', $id)->restore();
        return redirect()->route('soft-delete.exsicatas');
    }
}
