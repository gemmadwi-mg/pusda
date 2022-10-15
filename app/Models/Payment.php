<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'childrens_id',
         'periode_name',
         'date',
         'amount',
         'proof_of_payment',
         'status'
        ];
}
