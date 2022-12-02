<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    public const TYPE_PRIVATE = 0;
    public const TYPE_LEGAL = 1;

    protected $fillable = [
        'name',
        'last_name',
        'personal_code',
        'company_name',
        'company_reg_nr',
        'type',
    ];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public static function types(): array
    {
        return [
            self::TYPE_PRIVATE,
            self::TYPE_LEGAL,
        ];
    }

    public function totalPropertiesArea(): int
    {
        $total = 0;
        foreach ($this->properties as $property) {
            $total += $property->lands->sum('total_area');
        }

        return $total;
    }
}
