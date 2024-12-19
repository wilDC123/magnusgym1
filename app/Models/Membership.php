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
        'fecha_inicio',
        'fecha_fin',
        'dias_restantes',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'id_plan');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($membership) {
            $plan = Plan::find($membership->id_plan);

            if ($plan) {
                $membership->fecha_inicio = now()->toDateString();
                $membership->fecha_fin = now()->addDays($plan->duracion_dias)->toDateString();
                $membership->dias_restantes = $plan->duracion_dias;
            }
        });
    }

    public function calcularDiasRestantes()
    {
        $this->dias_restantes = now()->diffInDays($this->fecha_fin, false);

        if ($this->dias_restantes < 0) {
            $this->dias_restantes = 0; 
        }

        $this->save();
    }
}
