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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Epiteto::create($dataForm);
        return redirect()->route('epitetos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Epiteto::find($id);
        return view('epiteto.edit', compact('data'));
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
        $dataForm = $request->all();
        Epiteto::find($id)->update($dataForm);
        return redirect()->route('epitetos.index');
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
        Epiteto::find($dataForm['id'])->delete();
        $exsicata = Exsicata::where('epiteto_id', '=', $dataForm['id'])->get();
        foreach($exsicata as $data){
            $data->delete();
        }
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
        Epiteto::withTrashed()->where('id', $id)->restore();
        return redirect()->route('soft-delete.epitetos');
    }
}
