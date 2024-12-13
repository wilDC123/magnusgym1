<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'ci',
        'email',
        'phone',
        'gender'
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
