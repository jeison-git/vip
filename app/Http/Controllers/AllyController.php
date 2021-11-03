<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use Illuminate\Http\Request;

class AllyController extends Controller
{


    public function show(Claim $claim)
    {
        return view('claims.show', compact('claim'));
    }
}
