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
        'validity_period_of',
        'validity_period_until',
        'engagement_number',
        'engagement_date',
        'application_letter',
        'agreement_letter',
    ];
}
