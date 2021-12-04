<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employment;
use Illuminate\Support\Str;
use App\Models\Image;

use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class EditJobapplication extends Component
{
    /* use AuthorizesRequests; */
    public $applications, $application;

    protected $rules = [
        'application.names'          => 'required',
        'application.surnames'       => 'required',
        'slug'                       => 'required',
        'application.phone'          => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
        'application.email'          => 'required|email',
        'application.nationality'    => 'required',
        'application.identification' => 'required',
        'application.date'           => 'required',
        'application.marital_status' => 'required',
        'application.address'        => 'required',
        'application.academic_level' => 'required',
        'application.profession'     => 'required',
        'application.languages'      => 'required',
        'application.studies'        => 'required',
        'application.courses'        => 'required',
        'application.skills'         => 'required',
        'application.bilingue'       => 'required',


    ]; 
    protected $listeners = ['refreshApplication', 'delete'];

    public function mount(Employment $application)
    { //gancho de ciclo de vida
        $this->application = $application;

        $this->slug = $this->application->slug; //slug 
        $this->user_id = $this->application->slug; //slug 
    }

    public function refreshApplication()
    {
        $this->application = $this->application->fresh();
    }

    public function updatedApplicationNames($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {

        /* $this->authorize('dicatated',  $this->application); */

        $rules = $this->rules;

        $this->validate($rules);

        $this->application->slug = $this->slug;

        $this->application->save();

        $this->emit('saved');
    }

    // función para eliminar imagen 
    public function deleteImage(Image $image)
    {
        Storage::delete([$image->url]);
        $image->delete();

        $this->application = $this->application->fresh();
    }

    public function delete()
    {
        //función para eliminar 
        $images = $this->application->images;

        foreach ($images as $image) {
            Storage::delete($image->url);
            $image->delete();
        }

        $this->application->delete();

        return redirect()->route('job-application');
    }

    public function status(Employment $application)
    {
        if ($this->application->application) {
            $this->application->application->delete();
        }

        return redirect()->route('applications.edit', $application);
    }

    public function message(Employment $application)
    {
        return view('livewire.message-jobapplication', compact('application'));
    }

    public function render()
    {
        return view('livewire.edit-jobapplication');
    }
}
