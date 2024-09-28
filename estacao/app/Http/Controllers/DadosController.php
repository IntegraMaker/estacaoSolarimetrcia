<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolarimentriaDados;

class DadosController extends Controller
{
    // Página inicial 
    public function index(Request $request)
    {
        $data = SolarimentriaDados::whereBetween('medicao', [$request->dataInicio, $request->dataFinal])->get();

        return response()->json($data);
    }

}
