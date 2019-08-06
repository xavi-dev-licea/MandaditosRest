<?php

namespace APIMandaditos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    const USUARIO_VERIFICADO = '1';
    const USUARIO_NO_VERIFICADO = '0';

    const MANDADERO_DISPONIBLE = 'disponible';
    const MANDADERO_OCUPADO = 'ocupado';

    protected $table = 'users';
    protected $dates =[
        'deleted_at'
    ]; 
    
    protected $fillable = [
        'name', 
        'email', 
        'status',
        'password',
        'verified',
        'verification_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
        'verification_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function esVerificado()
    {
        return $this->verified = User::USUARIO_VERIFICADO;
    }

    public static function generateVerificationToken() 
    {
        return str_random(40);
    }
}
