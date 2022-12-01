<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    protected $casts = [
        'measurement_date' => 'date',
    ];
}
