<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employment;

use Illuminate\Support\Facades\Mail;
use App\Mail\AnswerApplications;


class ApplicationController extends Controller
{
    public function show(Employment $application){

        return view('admin.applications.show', compact('application'));

    }

    //responde las solicitudes
    public function message(Employment $application){
        return view('admin.applications.message', compact('application'));
    }

    //responder las solicitudes
    public function approved(Request $request, Employment $application){
        
        $request->validate([
            'body' => 'required'
        ]);

        $application->application()->create($request->all());

        $application->status = 3;
        $application->save();

        //Envio de correos
        $mail = new AnswerApplications($application);
        Mail::to($application->email)->send($mail);

        return redirect()->route('admin.applications.index');
    }
} 
