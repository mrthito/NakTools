<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'country_id',
        'currency_id',
        'price',
        'setup_fee',
        'offer_price',
        'offer_setup_fee',
        'status'
    ];

public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeByCountry($query, $country_id)
    {
        return $query->where('country_id', $country_id);
    }

    public function scopeByCurrency($query, $currency_id)
    {
        return $query->where('currency_id', $currency_id);
    }

    public function scopeByPlan($query, $plan_id)
    {
        return $query->where('plan_id', $plan_id);
    }
}
