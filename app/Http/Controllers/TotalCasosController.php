<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Confirmado;
use App\Models\Sospechoso;
use App\Models\Negativo;
use App\Models\Defuncion;
use Illuminate\Http\Request;

class TotalCasosController extends Controller
{
    public function totalCasos() {
        $confirmadoController = new ConfirmadoController();
        $totalConfirmados = $confirmadoController->totalConfirmados();

        $defuncionController = new DefuncionController();
        $totalDefunciones = $defuncionController->totalDefunciones();

        $negativoController = new NegativoController();
        $totalNegativos = $negativoController->totalNegativos();

        $sospechosoController = new SospechosoController();
        $totalSospechosos = $sospechosoController->totalSospechosos();


        $totalCasosCovid = [
            'confirmados' => $totalConfirmados,
            'defunciones' => $totalDefunciones,
            'negativos' => $totalNegativos,
            'sospechosos' => $totalSospechosos,
        ];

        return response()->json($totalCasosCovid);

    }

    public function totalCasosPorEstado() {
        $estados = Estado::all();
        $casosPorEstado = [];

        foreach ($estados as $estado) {
            $casosPorEstado[$estado->id] = [
                'confirmados' => Confirmado::where('ESTADO_ID', $estado->id)->sum('CASOS'),
                /*'sospechosos' => Sospechoso::where('ESTADO_ID', $estado->id)->sum('CASOS'),
                'negativos' => Negativo::where('ESTADO_ID', $estado->id)->sum('CASOS'),
                'defunciones' => Defuncion::where('ESTADO_ID', $estado->id)->sum('CASOS'),*/
            ];
        }

        return response()->json($casosPorEstado);
    }
}
