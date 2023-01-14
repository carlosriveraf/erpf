<div x-data="{ option_{{ $item->mod_id }}: false }" class="hover:bg-[#9e9e9e33] rounded-full w-full flex items-center text-center">
    <button x-on:click="option_{{ $item->mod_id }}=!option_{{ $item->mod_id }}">
        <svg width="24" height="24" fill="none" aria-hidden="true">
            <path d="M12 6v.01M12 12v.01M12 18v.01M12 7a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 6a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 6a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </button>
    <div>
        <ul x-show="option_{{ $item->mod_id }}" x-on:click.outside="option_{{ $item->mod_id }} = false" class="absolute left-8 top-8 mt-1 bg-white text-sm shadow-[0_2px_2px_0_rgba(0,0,0,0.14),0_3px_1px_-2px_rgba(0,0,0,0.2),0_1px_5px_0_rgba(0,0,0,0.12)]">
            <li x-on:click="option_{{ $item->mod_id }} = false" class="relative cursor-default select-none pl-3 pr-3 py-1 text-left">Editar</li>
            @if ($item->mod_estado == \App\Models\Modulo::ESTADO_INACTIVO)
                <li x-on:click="option_{{ $item->mod_id }} = false, cambiarEstado('{{ $item->mod_codigo }}', {{ \App\Models\Modulo::ESTADO_ACTIVO }})" class="relative cursor-default select-none pl-3 pr-3 py-1 text-left">Activar</li>
            @elseif($item->mod_estado == \App\Models\Modulo::ESTADO_ACTIVO)
                <li x-on:click="option_{{ $item->mod_id }} = false, cambiarEstado('{{ $item->mod_codigo }}', {{ \App\Models\Modulo::ESTADO_INACTIVO }})" class="relative cursor-default select-none pl-3 pr-3 py-1 text-left">Desactivar</li>
            @endif
            <li x-on:click="option_{{ $item->mod_id }} = false, eliminar('{{ $item->mod_codigo }}')" class="relative cursor-default select-none pl-3 pr-3 py-1 text-left">Eliminar</li>
        </ul>
    </div>
</div>
