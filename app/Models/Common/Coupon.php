<?php

namespace App\Models\Common;

use App\Enums\CouponType;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'type',
        'value',
        'description',
        'status',
        'start_date',
        'end_date'
    ];

    public function scopeUse($query, $code)
    {
        return $query->where('code', $code)
            ->where('status', Status::Active)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }

    public function getCouponValueAttribute()
    {
        if($this->type == CouponType::percentage) {
            return $this->value . '%';
        } else {
            return 'Flat Amount: '.$this->value;
        }
    }

    public function getTextStatusAttribute()
    {
        if($this->status == Status::Active && $this->start_date <= now() && $this->end_date >= now()){
            return true;
        }else {
            return false;
        }
    }
}
