<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function city_translations()
    {
        return $this->hasMany(CityTranslation::class, 'cities_id');
    }

    public function translation($locale)
    {
        return $this->city_translations()->where('language', $locale)->first();
    }
}
