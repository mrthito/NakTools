<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'feature'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function scopeByPlan($query, $plan_id)
    {
        return $query->where('plan_id', $plan_id);
    }
}
