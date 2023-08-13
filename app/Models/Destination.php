<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $guarded = [];

    public function destination_translations()
    {
        return $this->hasMany(DestinationTranslation::class, 'destinations_id');
    }

    public function translation($locale)
    {
        return $this->destination_translations()->where('language', $locale)->first();
    }
}
