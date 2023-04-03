<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'title',
        'image_one',
        'image_two',
        'image_three',
        'image_four',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
