<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Area extends Model
{
    use HasFactory;

    private const TYPE_AGRICUTURAL = "Agricutural land";
    private const TYPE_FOREST = "Forest land";
    private const TYPE_UNDER_THE_WATER = "Under the water land";
    private const TYPE_CONSTRUCTION = "Construction land";

    protected $fillable = [
        'land_id',
        'type',
        'area_covered',
    ];

    public function land(): BelongsTo
    {
        return $this->belongsTo(Land::class);
    }

    public static function types(): array
    {
        return [
            self::TYPE_AGRICUTURAL => self::TYPE_AGRICUTURAL,
            self::TYPE_FOREST => self::TYPE_FOREST,
            self::TYPE_UNDER_THE_WATER => self::TYPE_UNDER_THE_WATER,
            self::TYPE_CONSTRUCTION => self::TYPE_CONSTRUCTION,
        ];
    }
}
