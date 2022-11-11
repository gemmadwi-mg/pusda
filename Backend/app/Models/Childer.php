<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childer extends Model
{
    use HasFactory;
    protected $table = 'childers';
    protected $fillable = [
        'parent_id',
        'rental_retribution',
        'utilization_engagement_type',
        'utilization_engagement_name',
        'allotment_of_use',
        'coordinate',
        'large',
        'present_condition',
        'assets_value',
        'validity_period_of',
        'validity_period_until',
        'engagement_number',
        'engagement_date',
        'description',
        'year',
        'payment_amount',
        'application_letter',
        'agreement_letter',
        'proof_of_payment'
    ];

    public function parent()
    {
        return $this->belongsTo(Parents::class,'id');
    }

    public function payments ()
    {
        return $this->hasMany(Payment::class,'childrens_id');
    }



}
