<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKycDoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_kyc_id',
        'kyc_docs_country_id',
        'id_number',
        'name',
        'expiration_date',
        'file_path',
        'file_name',
        'file_type'
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function kyc()
    {
        return $this->belongsTo(UserKyc::class);
    }

    function document()
    {
        return $this->belongsTo(KycDocsCountry::class);
    }
}
