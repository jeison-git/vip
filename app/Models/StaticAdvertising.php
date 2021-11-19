<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class StaticAdvertising extends Model
{
    use HasFactory; 

    protected $guarded  = ['id'];    
    protected $dates    = ['finished_at'];

    public function getFinishedAtAttributes($date) {
        return $date ? Carbon::parse($date) : null;
    }

}
