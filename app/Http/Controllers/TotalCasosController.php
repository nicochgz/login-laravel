<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Confirmado;
use App\Models\Sospechoso;
use App\Models\Negativo;
use App\Models\Defuncion;

use App\Http\Controllers\ConfirmadoController;
use App\Http\Controllers\DefuncionController;
use App\Http\Controllers\NegativoController;
use App\Http\Controllers\SospechosoController;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TotalCasosController extends Controller
{

    public function index() {
        /*foreach (Estado::get() as $estado) {
            echo "<B>".$estado->NOMBRE."</B><br>";
        }*/

        return view('graficas.index');
    }

    /*public function totalCasos() {
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



    public function totalCasosPorEstado($id) {
        $estados = Estado::all();

        $casosPorEstado = [
            'estado' => Estado::find($id)->NOMBRE,
            'confirmados' => Confirmado::where('ESTADO_ID', $id)->sum('CASOS'),
            'sospechosos' => Sospechoso::where('ESTADO_ID', $id)->sum('CASOS'),
            'negativos' => Negativo::where('ESTADO_ID', $id)->sum('CASOS'),
            'defunciones' => Defuncion::where('ESTADO_ID', $id)->sum('CASOS')
        ];

        return response()->json($casosPorEstado);
    }*/

    public function getCasosTotales() {
        /*$estados = Estado::select('ID', 'NOMBRE')->with(['confirmados', 'sospechosos', 'negativos', 'defunciones'])->get();

        $casosPorEstado = [];
    
        foreach ($estados as $estado) {
            $estadoID = $estado->ID;
            $estadoNombre = $estado->NOMBRE;
            $estadoC = $estado->confirmados->sum('CASOS');
            $estadoS = $estado->sospechosos->sum('CASOS');
            $estadoN = $estado->negativos->sum('CASOS');
            $estadoD = $estado->defunciones->sum('CASOS');
    
            $casosPorEstado[] = [
                'estado_id' => $estadoID,
                'estado_nombre' => $estadoNombre,
                'estado_confirmados' => $estadoC,
                'estado_sospechosos' => $estadoS,
                'estado_negativos' => $estadoN,
                'estado_defunciones' => $estadoD
            ];

            
        }*/

        /*$resConfirmados = Http::timeout(90)->get('localhost:8000/confirmados/getConfirmados');
        $jsonConfirmados = $resConfirmados->json();

        $resDefunciones = Http::timeout(90)->get('localhost:8000/defunciones/getDefunciones');
        $jsonDefunciones = $resDefunciones->json();
        
        $resNegativos = Http::timeout(90)->get('localhost:8000/negativos/getNegativos');
        $jsonNegativos = $resNegativos->json();
        
        $resSospechosos = Http::timeout(90)->get('localhost:8000/sospechosos/getSospechosos');
        $jsonSospechosos = $resSospechosos->json();

        $jsonConfirmados = [
            'id' => $estado->ID,
            'estado' => $estado->NOMBRE,
            'confirmados' => $casosE
        ];

        $jsonDefunciones = [
            'defunciones' => $casosE
        ];

        $confirmadosString = json_encode($json1);
        $defuncionesString = json_encode($json2);
        $combinedJSONString = '{' . $confirmadosString . ',' . $defuncionesString . '}';
        $combinedJSON = json_decode($combinedJSONString);

        return response()->json($combinedJSON);*/
    }
}
