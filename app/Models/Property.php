<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [

        'monthly_rental',
        'deposit_amount',
        'max_tenants',
        'minimum_duration_months',
        'available_from',
        'council_tax_band',
        'epc_rating',
        'description'

    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
