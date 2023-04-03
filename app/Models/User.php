<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'tele',
        'servece',
        'city',
        'dscription',
        'facebook',
        'instagram',
        'linkden',
        'image',
        'role',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function services()
    {
        return $this->hasMany(service::class, 'id_user');
    }
    public function commentaire()
    {
        return $this->hasMany(commentaire::class, 'id_user');
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'id_user');
    }
    public function commentaireblog()
    {
        return $this->hasMany(commentaireblog::class, 'id_user');
    }
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class, 'id_user');
    }
}
