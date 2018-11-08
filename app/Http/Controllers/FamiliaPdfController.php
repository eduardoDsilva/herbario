<?php

namespace App\Http\Controllers;

use App\Familia;

class FamiliaPdfController extends Controller
{

    public function exsicataPdf($id)
    {
        try {
            $familia = Familia::find($id);
            $exsicatas = $familia->exsicata;
            return \PDF::setOptions(['dpi' => 325, 'defaultFont' => 'sans-serif'])
                ->loadView('pdf.exsicata-familia', compact('exsicatas', 'familia'))
                ->stream('familia-'.$familia->name.'-' . date('Y') . '.pdf');
        } catch (\Exception $e) {
            return abort(100,  '119.3');
        }
    }
}
