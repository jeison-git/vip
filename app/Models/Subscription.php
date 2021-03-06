<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Plan;

class Subscription extends Model
{
    use HasFactory; 

    protected $with = ['user']; 

    protected $fillable = [
        'active_until',
        'user_id',
        'plan_id',
    ];

    protected $dates = [
        'active_until',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function credential()
    {
        return $this->belongsTo(Credentialcard::class);
    }

    public function isActive()
    {
        return $this->active_until->gt(now());
    } 

}
