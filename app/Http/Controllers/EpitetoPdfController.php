<?php

namespace App\Http\Controllers;

use App\Epiteto;

class EpitetoPdfController extends Controller
{

    public function exsicataPdf($id)
    {
        try {
            $epiteto = Epiteto::find($id);
            $exsicatas = $epiteto->exsicata;
            return \PDF::setOptions(['dpi' => 325, 'defaultFont' => 'sans-serif'])
                ->loadView('pdf.exsicata-epiteto', compact('exsicatas', 'epiteto'))
                ->stream('epiteto-'.$epiteto->name.'-' . date('Y') . '.pdf');
        } catch (\Exception $e) {
            return abort(100,  '119.3');
        }
    }
}
