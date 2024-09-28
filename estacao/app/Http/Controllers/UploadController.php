<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SolarimentriaDadosImport;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //

    public function upload(Request $request)
    {

        //validar o arquivo 
        $request->validate([
            'file' => 'required|file|mimetypes:application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);

        //Realiza a importacao
        Excel::import(new SolarimentriaDadosImport, $request->file('file'));

        return redirect()->back()->with('sucess', 'Dados Importados com sucesso!' );
    }
}
