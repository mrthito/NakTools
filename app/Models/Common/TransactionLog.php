<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'type',
        'payment_mode',
        'status',
        'amount',
        'currency_id',
        'payment_gateway',
        'payment_gateway_transaction_id',
        'payment_gateway_status',
        'payment_gateway_response',
    ];

    protected $casts = [
        'type' => 'integer',
        'payment_mode' => 'integer',
        'status' => 'integer',
        'amount' => 'double',
        'payment_gateway_response' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', false);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopePaymentMode($query, $paymentMode)
    {
        return $query->where('payment_mode', $paymentMode);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
