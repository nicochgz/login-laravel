<?php

namespace App\Http\Controllers;
use App\Models\Negativo;
use App\Models\Estado;

use Illuminate\Http\Request;

class NegativoController extends Controller
{
    public function getCasosNegativos(){
        $negativos = Negativo::all();
        $totalCasos = $negativos->sum('CASOS');
        echo "Casos negativos: ".$totalCasos;
    }

    public function getCasosNegativosEstado($idEstado) {
        
        $estado = Estado::find($idEstado);
        $totalCasos = $estado->negativos->sum('CASOS');
        echo "Casos negativos de ".$estado->NOMBRE.": ".$totalCasos;
    }

    public function getCasosDesglosados() {
        
        
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estados as $estado) {
            $casosE = $estado->negativos->sum('CASOS');
            $totalCasos += $casosE;
            echo "Casos por el estado <B>".$estado->NOMBRE."</B> : ".$casosE."<br>";
        }
        echo "Casos totales negativos: ".$totalCasos;
    }

    public function index() {
        self::getCasosDesglosados();
    }
    
    public function show($idEstado){
        self::getCasosNegativosEstado($idEstado);
    }
}
