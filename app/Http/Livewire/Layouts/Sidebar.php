<?php

namespace App\Http\Livewire\Layouts;

use App\Models\Define;
use App\Models\Modulo;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        $modulos = Modulo::whereNull('mod_padre_id')
            ->where('mod_estado', '=', Modulo::ESTADO_ACTIVO)
            ->where('mod_eliminado', '=', Define::NO_ELIMINADO)
            ->get();

        return view('livewire.layouts.sidebar', [
            'modulos' => $modulos,
        ]);
    }
}
