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

    public function user()
    {
        return $this->belongsTo(User::class, 'auhtor', 'id');
    }

    public function childers ()
    {
        return $this->hasMany(Childer::class);
    }

    public function childerPayments()
    {
        return $this->hasOneThrough(Payment::class,Childer::class, 'parent_id', 'childrens_id', 'id', 'id');
    }

}
