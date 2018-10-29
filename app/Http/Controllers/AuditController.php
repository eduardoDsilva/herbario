<?php

namespace App\Http\Controllers;

use App\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Busca os registros de auditoria ordenando pelos mais recentes
        $data = Audit::latest()->paginate(10);
        return view('audit.index', compact('data'));
    }
}
