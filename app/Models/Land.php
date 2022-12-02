<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Land extends Model
{
    use HasFactory;

    public const CADASTRAL_SIGN_LENGTH = 11;

    protected $fillable = [
        'property_id',
        'cadastral_sign',
        'total_area',
        'measurement_date',
    ];

    protected $casts = [
        'measurement_date' => 'date',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }
}
