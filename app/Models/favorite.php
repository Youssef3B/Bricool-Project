<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_service',
        'id_user',
    ];


    public function service()
    {

        return $this->belongsTo(service::class, 'id_service');
    }

    public function user()
    {

        return $this->belongsTo(User::class, 'id_user');
    }
}
