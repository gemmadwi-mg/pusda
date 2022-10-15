<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childer extends Model
{
    use HasFactory;
    protected $table = 'childers';
    protected $fillable = [
        'application_letter',
        'agreement_letter',
        'parent_id',
        'utilization',
        'allcation',
        'large',
        'rental_value',
        'validity_period',
        'coornate',
        'description'
    ];
}
