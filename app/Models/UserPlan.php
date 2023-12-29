<?php

namespace App\Models;

use App\Models\Common\Currency;
use App\Models\Common\Plan;
use App\Models\Common\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPlan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'plan_id',
        'assigned_at',
        'expired_at',
        'assignable_id',
        'assignable_type',
        'is_trial',
        'currency_id',
        'price',
        'status',
    ];

    protected $casts = [
        'assigned_at' => 'datetime',
        'expired_at' => 'datetime',
        'is_trial' => 'boolean',
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function assignable()
    {
        return $this->morphTo();
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', false);
    }

    public function scopeTrial($query)
    {
        return $query->where('is_trial', true);
    }
}
