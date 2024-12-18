<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'id_membership', 
        'amount', 
        'payment_date', 
    ]; 
    public function membership() { 
        return $this->belongsTo(Membership::class, 'id_membership'); 
    }
}
