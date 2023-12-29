<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycDocsCountry extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'state_id',
        'name',
        'required',
        'has_id_number',
        'id_regex',
        'id_required',
        'has_name',
        'name_required',
        'has_expiration_date',
        'expiration_date_required',
        'number_of_pages'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function kycDocs()
    {
        return $this->belongsTo(UserKycDoc::class);
    }
}
