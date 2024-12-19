<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Membreship;

class UpdateDiasRestantes extends Command
{
    protected $signature = 'membreships:update-dias-restantes';
    protected $description = 'Actualizar los días restantes de las membresías';

    public function handle()
    {
        Membreship::all()->each(function ($membreship) {
            $membreship->calcularDiasRestantes();
        });

        $this->info('Días restantes actualizados correctamente.');
    }
}
