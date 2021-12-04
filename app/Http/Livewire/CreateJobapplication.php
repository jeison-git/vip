<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employment;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class CreateJobapplication extends Component
{
    public $names, $surnames, $slug, $phone, $email, $user_id;
    public $nationality = "", $academic_level = "", $marital_status = "";
    public $address, $identification, $date, $profession, $languages, $bilingue;
    public $studies, $courses, $skills;
    public $applications, $application;

    protected $rules = [
        'names'          => 'required',
        'surnames'       => 'required',
        'slug'           => 'required',
        'phone'          => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
        'email'          => 'required|email',
        'nationality'    => 'required',
        'identification' => 'required',
        'date'           => 'required',
        'marital_status' => 'required',
        'address'        => 'required',
        'academic_level' => 'required',
        'profession'     => 'required',
        'languages'      => 'required',
        'studies'        => 'required',
        'courses'        => 'required',
        'skills'         => 'required',


    ];

    public function updatedNames($value){
        $this->slug = Str::slug($value);
    }

    //guardar solicitud de empleo
    public function save()
    {
        $rules = $this->rules;

        $this->validate($rules);

        $application = new Employment(); 

        $application->user_id        = auth()->user()->id;
        $application->names          = $this->names;
        $application->surnames       = $this->surnames;
        $application->slug           = $this->slug;
        $application->phone          = $this->phone;
        $application->email          = $this->email;
        $application->nationality    = $this->nationality;
        $application->identification = $this->identification;
        $application->date           = $this->date;
        $application->marital_status = $this->marital_status;
        $application->address        = $this->address;
        $application->academic_level = $this->academic_level;
        $application->profession    = $this->profession;
        $application->languages     = $this->languages;
        $application->studies       = $this->studies;
        $application->courses       = $this->courses;
        $application->skills        = $this->skills;
        $application->bilingue      = $this->bilingue;

        $application->save(); 

        session()->flash('flash.banner', '¡Gracias usted a añadido uns solicitud!');
        return redirect()->route('applications.edit', $application);

       
    }

    public function render()
    {
                
        return view('livewire.create-jobapplication');
    }
}
