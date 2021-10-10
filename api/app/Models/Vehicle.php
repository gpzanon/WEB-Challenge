<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'name',
        'vehicle_year',
        'brand_year',
        'description',
        'is_sold',
        'sold_in'
    ];

    protected static function booted()
    {
        static::updating(function (Vehicle $vehicle) {
            $vehicle->sold_in = ($vehicle->is_sold ? date('Y-m-d H:i:s') : null);
        });
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
