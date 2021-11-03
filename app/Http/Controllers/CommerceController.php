<?php

namespace App\Http\Controllers;
use App\Models\Claim;

use Illuminate\Http\Request;

class CommerceController extends Controller
{
    public function show(Claim $claim)
    {
        
        return view('commerces.show', compact('claim'));
    }
} 
