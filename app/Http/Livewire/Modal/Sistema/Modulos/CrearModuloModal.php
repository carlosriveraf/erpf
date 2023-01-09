<?php

namespace App\Http\Livewire\Modal\Sistema\Modulos;

use App\Models\Modulo;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CrearModuloModal extends ModalComponent
{
    public function render(): View
    {
        $modulos = Modulo::getModulosPadre()
            ->prepend(['id' => -1, 'descripcion' => '--Seleccione--'])
            ->toJson();

        return view('livewire.modal.sistema.modulos.crear-modulo-modal', [
            'modulos' => $modulos,
        ]);
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }
}
