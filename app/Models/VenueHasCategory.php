<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueHasCategory extends Model
{
    use HasFactory;

    protected $fillable = ['venue_id', 'category_id'];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
