<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'images', 'phone', 'email', 'city', 'status',];

    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class, 'venues_has_fields');
    }
}
