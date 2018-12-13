<?php

namespace App\Http\Controllers;

use App\Exsicata;
use Illuminate\Http\Request;

class ExsicataPdfController extends Controller
{

    public function exsicataPdf(Request $request)
    {
        try {
            $dataForm = $request->all();
            $campos[] = null;
            foreach($dataForm['campos'] as $c){
                $campos[] = $c;
            }
            $exsicata = Exsicata::find($dataForm['id']);
            return \PDF::setOptions(['dpi' => 325, 'defaultFont' => 'sans-serif'])
                ->loadView('pdf.exsicata-individual', compact('exsicata', 'campos'))
                ->stream($exsicata->genero->name." ".$exsicata->epiteto->name.'-' . date('Y') . '.pdf');
        } catch (\Exception $e) {
            return abort(100,  '119.3');
        }
    }

    public function etiqueta($id){
        $exsicata = Exsicata::find($id);
        return \PDF::setOptions(['dpi' => 325, 'defaultFont' => 'sans-serif'])
            ->loadView('pdf.exsicata-etiqueta', compact('exsicata'))
            ->stream('etiquetas-' . date('Y') . '.pdf');
    }

    public function etiquetas(){
        $exsicatas = Exsicata::all();
        return \PDF::setOptions(['dpi' => 325, 'defaultFont' => 'sans-serif'])
            ->loadView('pdf.exsicata-etiquetas', compact('exsicatas'))
            ->stream('etiquetas-' . date('Y') . '.pdf');
    }

}
