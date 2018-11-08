<?php

namespace App\Http\Controllers;

use App\Exsicata;
use App\Familia;
use App\Genero;
use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Familia::orderBy('name', 'asc')->paginate(10);
        return view('familia.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Familia::create($request->all());
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Exsicata::where('familia_id', '=', $id)->orderBy('name', 'asc')->paginate(10);
        $table = true;
        return view('exsicatas.index', compact('data', 'table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Familia::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Familia::find($request->all()['id'])->update($request->all());
        $data = Familia::find($request->all()['id']);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Familia::find($request->all()['id'])->delete();
        $familia = Exsicata::where('familia_id', '=', $request->all()['id'])->get();
        foreach($familia as $data){
            $data->delete();
        }
        return response()->json('ok');
    }

    /**
     * Recovers a previously deleted record
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recovery($id)
    {
        Familia::withTrashed()->where('id', $id)->restore();
        return redirect()->route('soft-delete.familias');
    }

    public function filtrar(Request $request)
    {
        $dataForm = $request->all();
        if ($dataForm['tipo'] == 'nome') {
            $filtro = '%' . $dataForm['search'] . '%';
            $data = Familia::where('name', 'like', $filtro)->paginate(10);
        }
        return view('familia.index', compact('data'));
    }
}
