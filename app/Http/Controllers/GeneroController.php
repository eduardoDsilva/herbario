<?php

namespace App\Http\Controllers;

use App\Exsicata;
use App\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Genero::orderBy('name', 'asc')->paginate(10);
        return view('genero.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Genero::create($request->all());
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Exsicata::where('genero_id', '=', $id)->orderBy('name', 'asc')->paginate(10);
        $table = true;
        return view('exsicatas.index', compact('data', 'table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Genero::find($id);
        return response()->json($data);
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
        Genero::find($request->all()['id'])->update($request->all());
        $data = Genero::find($request->all()['id']);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Genero::find($request->all()['id'])->delete();
        $genero = Exsicata::where('genero_id', '=', $request->all()['id'])->get();
        foreach ($genero as $data) {
            $data->delete();
        }
        return response()->json('ok');
    }

    /**
     * Recovers a previously deleted record
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function recovery($id)
    {
        Genero::withTrashed()->where('id', $id)->restore();
        return redirect()->route('soft-delete.generos');
    }
}
