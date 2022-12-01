<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public static function types(): array
    {
        return [
            self::TYPE_PRIVATE,
            self::TYPE_LEGAL,
        ];
    }
}
