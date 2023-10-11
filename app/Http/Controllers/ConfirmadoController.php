<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmado;

class ConfirmadoController extends Controller
{
    public function show(string $id): View 
    {
        
        dd(Confirmado::find($id));
    }
}
