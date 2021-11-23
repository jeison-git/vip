<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employment;
use Illuminate\Support\Facades\Storage;

class EmploymentController extends Controller
{
   // función para subir imagenes y añadirlos alos curriculum
   public function files(Employment $application, Request $request){

    $request->validate([
        'file' => 'required|image|max:2048'
    ]);
    
    $url = Storage::put('products', $request->file('file'));

    $application->images()->create([
        'url' => $url
    ]);
}
}
