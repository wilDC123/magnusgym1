<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_name',
        'description',
        'duracion_dias',
        'price'
    ];

    public function memberships(){
        return $this->hasMany(Membership::class);
    }
}
