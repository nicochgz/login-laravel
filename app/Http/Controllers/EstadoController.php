<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
//use Illuminate\View\View;

class EstadoController extends Controller
{
    public function show(string $id): View 
    {
        
        dd(Estado::find($id));
    }
}
