<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'location', 'about', 'feature_event',
        'language', 'foods', 'departure_date', 'duration',
        'type', 'price'
    ];

    protected $hidden = [

    ];

    // relasi gallery dengan paket travel
    public function galleries() {
        return $this->hasMany(
            Gallery::class, 
            'travel_packages_id', 
            'id');
    }
}
