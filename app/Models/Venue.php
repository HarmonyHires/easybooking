<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'images', 'phone', 'email', 'city', 'status', 'user_id', 'category_id'];

    public function categories()
    {
        return $this->hasMany(Categories::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
