<?php

namespace App\Http\Controllers;
use App\Models\Sospechoso;
use App\Models\Estado;

use Illuminate\Http\Request;

class SospechosoController extends Controller
{
    public function getCasosSospechosos(){
        $sospechosos = Confirmado::all();
        $totalCasos = $sospechosos->sum('CASOS');
        echo "Casos sospechosos: ".$totalCasos;
    }

    public function getCasosSospechososEstado($idEstado) {
        
        $estado = Estado::find($idEstado);
        $totalCasos = $estado->sospechosos->sum('CASOS');
        echo "Casos sospechosos de ".$estado->NOMBRE.": ".$totalCasos;
    }

    public function getCasosDesglosados() {
        
        
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estados as $estado) {
            $casosE = $estado->sospechosos->sum('CASOS');
            $totalCasos += $casosE;
            echo "Casos por el estado <B>".$estado->NOMBRE."</B> : ".$casosE."<br>";
        }
        echo "Casos totales sospechosos: ".$totalCasos;
    }

    public function index() {
        self::getCasosDesglosados();
    }
    
    public function show($idEstado){
        self::getCasosSospechososEstado($idEstado);
    }


    public function getSospechosos(){
        $estados = Estado::all();
        foreach ($estados as $estado) {
            $casosE = $estado->sospechosos->sum('CASOS');
            $sospechososEstado[] = [
                'id_estado' => $estado->ID,
                'estado_nombre' => $estado->NOMBRE,
                'sospechosos' => $casosE
            ];
        }
        return response()->json($sospechososEstado);
    }
}
