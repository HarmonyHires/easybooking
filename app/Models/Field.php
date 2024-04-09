<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'images', 'phone', 'email', 'address', 'field_type', 'floor_type', 'price'];

    public function venues()
    {
        return $this->belongsToMany(Venue::class, 'venues_has_fields');
    }
}
