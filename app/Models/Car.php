<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory, Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'brand',
        'model',
        'license_plate',
        'daily_rental_rate',
        'photo_car',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'daily_rental_rate' => 'double',
    ];

    public function rentalCars(): HasMany
    {
        return $this->hasMany(RentalCar::class);
    }

    public function returnCars(): HasMany
    {
        return $this->hasMany(ReturnCar::class);
    }

    public function getFullNameAttribute()
    {
        return $this->attributes['brand'] . ' (' . $this->attributes['model'] . ')';
    }
}
