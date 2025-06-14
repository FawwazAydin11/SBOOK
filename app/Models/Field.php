<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'name', 'photo', 'price', 'available'
    ];

    protected $casts = [
    'available' => 'boolean',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'lapangan_id');
    }

}
