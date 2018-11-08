<?php

namespace App\Http\Controllers;

use App\Genero;

class GeneroPdfController extends Controller
{

    public function exsicataPdf($id)
    {
        try {
            $genero = Genero::find($id);
            $exsicatas = $genero->exsicata;
            return \PDF::setOptions(['dpi' => 325, 'defaultFont' => 'sans-serif'])
                ->loadView('pdf.exsicata-genero', compact('exsicatas', 'genero'))
                ->stream('genero-'.$genero->name.'-' . date('Y') . '.pdf');
        } catch (\Exception $e) {
            return abort(100,  '119.3');
        }
    }
}
