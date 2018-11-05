<?php

namespace App\Http\Controllers;

use App\Exsicata;

class ExsicataPdfController extends Controller
{

    public function exsicataPdf($id)
    {
        try {
            $exsicata = Exsicata::find($id);
            return \PDF::setOptions(['dpi' => 325, 'defaultFont' => 'sans-serif'])
                ->loadView('admin.pdf.exsicata-individual', compact('exsicata'))
                ->stream($exsicata->genero->name." ".$exsicata->epiteto->name.'-' . date('Y') . '.pdf');
        } catch (\Exception $e) {
            return abort(100,  '119.3');
        }
    }
}
