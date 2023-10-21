<?php

namespace App\Http\Controllers;
use App\Models\Defuncion;
use App\Models\Estado;

use Illuminate\Http\Request;

class DefuncionController extends Controller
{
    public function getCasosDefunciones(){
        $defunciones = Defuncion::all();
        $totalCasos = $defunciones->sum('CASOS');
        echo "Casos defunciones: ".$totalCasos;
    }

    public function getCasosDefuncionesEstado($idEstado) {
        
        $estado = Estado::find($idEstado);
        $totalCasos = $estado->defunciones->sum('CASOS');
        echo "Casos defunciones de ".$estado->NOMBRE.": ".$totalCasos;
    }

    public function getCasosDesglosados() {
        
        
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estados as $estado) {
            $casosE = $estado->defunciones->sum('CASOS');
            $totalCasos += $casosE;
            echo "Casos por el estado <B>".$estado->NOMBRE."</B> : ".$casosE."<br>";
        }
        echo "Casos totales defunciones: ".$totalCasos;
    }

    public function index() {
        self::getCasosDesglosados();
    }
    
    public function show($idEstado){
        self::getCasosDefuncionesEstado($idEstado);
    }
}
