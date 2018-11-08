<?php

namespace App\Http\Controllers;

use App\Epiteto;
use App\Exsicata;
use Illuminate\Http\Request;

class EpitetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Epiteto::orderBy('name', 'asc')->paginate(10);
        return view('epiteto.index', compact('data'));
    }

    public function epiteto()
    {
        $data = Epiteto::with(['exsicata'])->orderBy('name', 'asc')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Epiteto::create($request->all());
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
        $data = Exsicata::where('epiteto_id', '=', $id)->orderBy('name', 'asc')->paginate(10);
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
        $data = Epiteto::find($id);
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
        Epiteto::find($request->all()['id'])->update($request->all());
        $data = Epiteto::find($request->all()['id']);
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
        Epiteto::find($request->all()['id'])->delete();
        $exsicata = Exsicata::where('epiteto_id', '=', $request->all()['id'])->get();
        foreach ($exsicata as $data) {
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
        Epiteto::withTrashed()->where('id', $id)->restore();
        return redirect()->route('soft-delete.epitetos');
    }

    public function filtrar(Request $request)
    {
        $dataForm = $request->all();
        if ($dataForm['tipo'] == 'nome') {
            $filtro = '%' . $dataForm['search'] . '%';
            $data = Epiteto::where('name', 'like', $filtro)->paginate(10);
        }
        return view('epiteto.index', compact('data'));
    }
}
