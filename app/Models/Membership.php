<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_client',
        'id_plan',
    ];
    public function client()
        {
            return $this->belongsTo(Client::class, 'id_client');
        }

    public function plan()
        {
            return $this->belongsTo(Plan::class, 'id_plan');
        }
}