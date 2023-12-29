<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'interval',
        'interval_type',
        'trial_period_days',
        'featured',
        'status',
        'free'
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
        'free' => 'boolean'
    ];

    public function features()
    {
        return $this->hasMany(PlanFeature::class);
    }

    public function pricings()
    {
        return $this->hasMany(PlanPricing::class);
    }
}
