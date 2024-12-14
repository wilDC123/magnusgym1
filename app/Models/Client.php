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

    public function memberships(){
        return $this->hasMany(Membership::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }
}
