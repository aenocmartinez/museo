<?php

namespace App\Http\Controllers\api;

use Src\museologo\infraestructure\repository\EloquentMuseologo;
use Src\museologo\usecase\CasoUsoListarCampos;
use App\Http\Requests\RequestGuardarCampo;
use App\Http\Controllers\Controller;
use App\Http\Resources\ListaCampos;
use Illuminate\Http\Request;
use MuseologoRepository;
use Src\museologo\usecase\CasoUsoCrearCampo;

class MuseologoController extends Controller
{
    public function index()
    {
        $data = [];
        $casoUso = new CasoUsoListarCampos(new EloquentMuseologo());
        $campos = $casoUso->ejecutar(); 
        // return $campos;
        return response()->json([
            "data" => ListaCampos::collection($campos),
        ]);
    }

    public function store(RequestGuardarCampo $req)
    {
        $message = "success";
        $casoUso = new CasoUsoCrearCampo(new EloquentMuseologo());
        $exito = $casoUso->ejecutar($req);
        if (!$exito) {
            $message = "Error";
        }
        return response()->json([
            'message' => $message,
            'code' => "200"
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
