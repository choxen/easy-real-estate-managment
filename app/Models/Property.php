<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{
    use HasFactory;

    public const CADASTRAL_NUMBER_LENGTH = 11;

    private const STATUS_PAID = 'Paid';
    private const STATUS_CONTRACT = 'Contract';
    private const STATUS_REGISTERED = 'Registered';
    private const STATUS_SOLD = "Sold";

    protected $fillable = [
        'name',
        'cadastral_number',
        'status',
        'client_id',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public static function statuses(): array
    {
        return [
            self::STATUS_PAID => self::STATUS_PAID,
            self::STATUS_CONTRACT => self::STATUS_CONTRACT,
            self::STATUS_REGISTERED => self::STATUS_REGISTERED,
            self::STATUS_SOLD => self::STATUS_SOLD
        ];
    }
}
