<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = [
        'trainer_name',
        'phone',
        'email',
        'id_workshift',
    ];
    public function workshift()
    {
        return $this->belongsTo(Workshift::class, 'id_workshift');
    }
}
