<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',        
        'social_id',
        'social_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

     //Relacion uno a muchos
     public function orders(){
        return $this->hasMany(Order::class);
    }

    /////////////////
    public function reviews(){  // (reviews un usuario puede comentar muchas veces)

        return $this->hasMany(Review::class);

    }

    ////////////////////// 
    public function job_application(){  //(un desempleado  tiene muchas solicitudes de empleo)

        return $this->hasMany(Employment::class);
        
    }
    ////
    public function experiences(){

        return $this->belongsToMany(Experience::class);
    }

    //////////////subscription
    
    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function credential()
    {
        return $this->hasOne(Credentialcard::class);
    }

    public function hasActiveSubscription()
    {
        // return true;
        return optional($this->subscription)->isActive() ?? false;
    } 
    
}
