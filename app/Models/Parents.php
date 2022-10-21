<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;
    protected $table = 'parents';
    protected $fillable = [
        'auhtor',
        'certificate_number',
        'certificate_date',
        'utilization_type',
        'address',
        'large'
    ];

}
