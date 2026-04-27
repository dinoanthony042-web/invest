<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CryptoCurrency extends Model
{
    protected $fillable = [
        'symbol',
        'name',
        'current_price',
        'market_cap',
        'price_change_24h',
    ];

    public function investments(): HasMany
    {
        return $this->hasMany(Investment::class);
    }
}
