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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->all();
        $endereco = Endereco::create($dataForm);
        $exsicata = Exsicata::create($dataForm + ['endereco_id' => $endereco->id]);
        return redirect()->route('exsicatas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
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
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $dataForm = $request->all();
        $exsicata = Exsicata::find($dataForm['id']);
        $exsicata->delete();
        return redirect()->back();
    }

    /**
     * Recovers a previously deleted record
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function recovery($id)
    {
        Exsicata::withTrashed()->where('id', $id)->restore();
        return redirect()->route('soft-delete.exsicatas');
    }

    public function filtrar(Request $request)
    {
        $dataForm = $request->all();
        switch ($dataForm['tipo']) {
            case 'bdd':
                $data = Exsicata::where('bdd', '=', $dataForm['search'])->paginate(10);
                break;
            case 'coletor':
                $filtro = '%' . $dataForm['search'] . '%';
                $data = Exsicata::where('coletor', 'like', $filtro)->paginate(10);
                break;
            case 'cidade':
                $filtro = '%' . $dataForm['search'] . '%';
                $cidade = Endereco::where('municipio', 'like', $filtro)->get();
                $array[] = null;
                foreach ($cidade as $id) {
                    $array[] = $id->id;
                }
                $data = Exsicata::whereIn('endereco_id', $array)->paginate(10);
                break;
            case 'estado':
                $filtro = '%' . $dataForm['search'] . '%';
                $estado = Endereco::where('estado', 'like', $filtro)->get();
                $array[] = null;
                foreach ($estado as $id) {
                    $array[] = $id->id;
                }
                $data = Exsicata::whereIn('endereco_id', $array)->paginate(10);
                break;
            case 'determinador':
                $filtro = '%' . $dataForm['search'] . '%';
                $data = Exsicata::where('determinador', 'like', $filtro)->paginate(10);
                break;
            case 'epiteto':
                $filtro = '%' . $dataForm['search'] . '%';
                $epiteto = Epiteto::where('name', 'like', $filtro)->get();
                $array[] = null;
                foreach ($epiteto as $id) {
                    $array[] = $id->id;
                }
                $data = Exsicata::whereIn('epiteto_id', $array)->paginate(10);
                break;
            case 'escaninho':
                $data = Exsicata::where('determinador', '=', $dataForm['search'])->paginate(10);
                break;
            case 'familia':
                $filtro = '%' . $dataForm['search'] . '%';
                $familia = Familia::where('name', 'like', $filtro)->get();
                $array[] = null;
                foreach ($familia as $id) {
                    $array[] = $id->id;
                }
                $data = Exsicata::whereIn('familia_id', $array)->paginate(10);
                break;
            case 'genero':
                $filtro = '%' . $dataForm['search'] . '%';
                $genero = Genero::where('name', 'like', $filtro)->get();
                $array[] = null;
                foreach ($genero as $id) {
                    $array[] = $id->id;
                }
                $data = Exsicata::whereIn('genero_id', $array)->paginate(10);
                break;
            case 'habitat':
                $filtro = '%' . $dataForm['search'] . '%';
                $habitat = Endereco::where('habitat', 'like', $filtro)->get();
                $array[] = null;
                foreach ($habitat as $id) {
                    $array[] = $id->id;
                }
                $data = Exsicata::whereIn('endereco_id', $array)->paginate(10);
                break;
            case 'local':
                $filtro = '%' . $dataForm['search'] . '%';
                $local = Endereco::where('local', 'like', $filtro)->get();
                $array[] = null;
                foreach ($local as $id) {
                    $array[] = $id->id;
                }
                $data = Exsicata::whereIn('endereco_id', $array)->paginate(10);
                break;
            case 'numero':
                $data = Exsicata::where('numero', '=', $dataForm['search'])->paginate(10);
                break;
            case 'pais':
                $filtro = '%' . $dataForm['search'] . '%';
                $pais = Endereco::where('pais', 'like', $filtro)->get();
                $array[] = null;
                foreach ($pais as $id) {
                    $array[] = $id->id;
                }
                $data = Exsicata::whereIn('endereco_id', $array)->paginate(10);
                break;
        }
        $table = true;
        return view('exsicatas.index', compact('data', 'table'));
    }
}
