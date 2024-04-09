<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueFields extends Model
{
    use HasFactory;

    protected $fillable = ['venue_id', 'field_id'];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
