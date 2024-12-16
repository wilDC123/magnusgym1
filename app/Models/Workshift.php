<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshift extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'workshift_name', 
        'start_time', 
        'end_time', ];

    public function trainers() { 
        return $this->hasMany(Trainer::class); 
    }
}
