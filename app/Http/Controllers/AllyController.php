<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use Illuminate\Http\Request;

class AllyController extends Controller
{

    ////función para Mostrar los productos de aliados comerciales vip
    
    public function show(Claim $claim)
    {
        return view('claims.show', compact('claim'));
    }
}
