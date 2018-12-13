<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Epiteto;
use App\Exsicata;
use App\Familia;
use App\Genero;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use QR_Code\QR_Code;

class ExsicataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Exsicata::with('endereco')->paginate(9);
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
        $data = Exsicata::paginate(6);
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
    public function store(Request $request, ImageRepository $repo)
    {
        $dataForm = $request->except('img');
        $endereco = Endereco::create($dataForm);
        $exsicata = Exsicata::create($dataForm + ['endereco_id' => $endereco->id]);
        if ($request->hasFile('img')) {
            $exsicata->image = $repo->saveImage($request->img, $exsicata->id, 'exsicatas', 250);
            $exsicata->save();
        }
        $fileName = time() . random_int(100, 999) . '.png';
        QR_Code::png('herbario.saoleopoldo.rs.gov.br/exsicatas/' . $exsicata->id, 'images/qrcodes/' . $fileName);
        $exsicata->qrcode = 'https://' . $_SERVER['HTTP_HOST'] . '/images/qrcodes/' . $fileName;
        $exsicata->save();
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
    public function update(Request $request, $id, ImageRepository $repo)
    {
        $exsicata = Exsicata::with('endereco')->where('id', '=', $id)->first();
        $exsicata->fill($request->all())->save();
        $exsicata->endereco->fill($request->all())->save();
        if ($request->hasFile('img')) {
            $this->deleteImage($exsicata->image);
            $exsicata->image = $repo->saveImage($request->img, $exsicata->id, 'exsicatas', 1000);
            $exsicata->save();
        }
        if (($request->apagaImg == "on") && (!$request->hasFile('img'))) {
            $this->deleteImage($exsicata->image);
            $exsicata->image = "";
            $exsicata->save();
        }
        return redirect()->route('exsicatas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $exsicata = Exsicata::find($request->id);
        $this->deleteImage($exsicata->image);
        $exsicata->delete();
        return redirect()->route('exsicatas.index');
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
        $exsicata = Exsicata::find($id);
        $exsicata->image = '';
        $exsicata->save();
        return redirect()->route('soft-delete.exsicatas');
    }

    public function filtrar(Request $request)
    {
        $dataForm = array_filter($request->all());
        $data = Exsicata::where(function ($query) use ($dataForm) {
            if (array_key_exists('coletor', $dataForm)) {
                $filtro = $dataForm['coletor'];
                $query->where('coletor', "like", "%{$filtro}%");
            }

            if (array_key_exists('determinador', $dataForm)) {
                $filtro = $dataForm['determinador'];
                $query->where('determinador', 'like', "%{$filtro}%");
            }

            if (array_key_exists('escaninho', $dataForm)) {
                $filtro = $dataForm['escaninho'];
                $query->where('escaninho', "like", "%{$filtro}%");
            }

            if (array_key_exists('numero', $dataForm)) {
                $filtro = $dataForm['numero'];
                $query->where('numero', "=", $filtro);
            }

            if (array_key_exists('municipio', $dataForm)) {
                $filtro = $dataForm['municipio'];
                $municipio = Endereco::where('municipio', 'like', "%{$filtro}%")->get();
                $query->whereIn('endereco_id', $this->percorrerArray($municipio));
            }

            if (array_key_exists('estado', $dataForm)) {
                $filtro = $dataForm['estado'];
                $estado = Endereco::where('uf', 'like', "%{$filtro}%")->get();
                $query->whereIn('endereco_id', $this->percorrerArray($estado));
            }

            if (array_key_exists('epiteto', $dataForm)) {
                $filtro = $dataForm['epiteto'];
                $epiteto = Epiteto::where('name', 'like', "%{$filtro}%")->get();
                $query->whereIn('epiteto_id', $this->percorrerArray($epiteto));
            }

            if (array_key_exists('familia', $dataForm)) {
                $filtro = $dataForm['familia'];
                $familia = Familia::where('name', 'like', "%{$filtro}%")->get();
                $query->whereIn('familia_id', $this->percorrerArray($familia));
            }

            if (array_key_exists('genero', $dataForm)) {
                $filtro = $dataForm['genero'];
                $genero = Genero::where('name', 'like', "%{$filtro}%")->get();
                $query->whereIn('genero_id', $this->percorrerArray($genero));
            }

            if (array_key_exists('habitat', $dataForm)) {
                $filtro = $dataForm['habitat'];
                $habitat = Endereco::where('habitat', 'like', "%{$filtro}%")->get();
                $query->whereIn('endereco_id', $this->percorrerArray($habitat));
            }

        })
            ->paginate(9);
        $table = true;
        return view('exsicatas.index', compact('data', 'table'));
    }

    private function deleteImage($imagem)
    {
        $caminhoImagem = str_replace('https://' . $_SERVER['HTTP_HOST'] . '/', "", $imagem);
        if (($caminhoImagem != "") && ($caminhoImagem != "images/exsictas/placeholder300x300.jpg")) {
            unlink($caminhoImagem);
        }
    }

    private function percorrerArray($data)
    {
        $array[] = null;
        foreach ($data as $id) {
            $array[] = $id->id;
        }
        return $array;
    }
}
