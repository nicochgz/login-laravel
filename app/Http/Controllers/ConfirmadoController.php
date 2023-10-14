<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmado;
use App\Models\Estado;

class ConfirmadoController extends Controller
{
    public function show(string $id): View 
    {
        
        dd(Confirmado::find($id));
    }

    public function totalConfirmados() {
        $totalSumConfirmados = Confirmado::sum('CASOS');
        return $totalSumConfirmados;
    }

    /*public function confirmadosPorEstado() {
        $estados = Estado::all();
        $casosPorEstado = [];

        foreach ($estados as $estado) {
            $casosPorEstado[$estado->id] = [
                'confirmados' => Confirmado::sum('CASOS')
            ];
        }

        return $casosPorEstado;
    }*/

}
