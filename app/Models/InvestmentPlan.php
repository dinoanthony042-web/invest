<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'roi_percentage',
        'duration_months',
        'duration_days',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'roi_percentage' => 'decimal:2',
        'duration_days' => 'integer',
        'is_active' => 'boolean',
    ];

    public function getDurationDaysAttribute($value)
    {
        if ($value !== null && $value > 0) {
            return $value;
        }

        return $this->duration_months ? $this->duration_months * 30 : 0;
    }

    public function getDurationTextAttribute()
    {
        $days = $this->duration_days;

        if ($days % 365 === 0) {
            return ($days / 365) . ' year' . ($days / 365 > 1 ? 's' : '');
        }

        if ($days % 30 === 0) {
            return ($days / 30) . ' month' . ($days / 30 > 1 ? 's' : '');
        }

        return $days . ' days';
    }

    public function userInvestments()
    {
        return $this->hasMany(UserInvestment::class);
    }
}
