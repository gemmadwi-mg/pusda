<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;
    protected $table = 'parents';
    protected $fillable = [
        'no_reg',
        'auhtor',
        'name_goods',
        'address',
        'village',
        'kec',
        'kab_city',
        'no',
        'date',
        'large'
    ];


    public function users()
    {
        return $this->hasOne(User::class,'id','auhtor');
    }


}
