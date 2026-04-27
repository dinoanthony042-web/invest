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
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'roi_percentage' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function userInvestments()
    {
        return $this->hasMany(UserInvestment::class);
    }
}
