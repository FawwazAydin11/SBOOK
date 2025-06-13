<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'user_id', 'name', 'photo', 'price',
        'start_time', 'end_time', 'available_from'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
