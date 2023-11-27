<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReturnCar extends Model
{
    use HasFactory, Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'car_id',
        'rental_id',
        'return_date',
        'rental_duration_days',
        'rental_car_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'car_id' => 'integer',
        'rental_id' => 'integer',
        'return_date' => 'timestamp',
        'rental_duration_days' => 'double',
        'rental_car_id' => 'integer',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function rentalCar(): BelongsTo
    {
        return $this->belongsTo(RentalCar::class);
    }

    public function rental(): BelongsTo
    {
        return $this->belongsTo(RentalCar::class);
    }
}
