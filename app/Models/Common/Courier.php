<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courier extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'name',
        'code',
        'logo',
        'featured_image',
        'url',
        'library_class',
        'sort_order',
        'custom_api_available',
        'status'
    ];

    protected $casts = [
        'custom_api_available' => 'boolean',
        'status' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', false);
    }

    public function scopeSortOrder($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    public function scopeName($query, $name)
    {
        return $query->where('name', $name);
    }

    public function scopeCode($query, $code)
    {
        return $query->where('code', $code);
    }
}
