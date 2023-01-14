<div>
    <div class="px-5 py-3">
        <div class="mb-3 text-lg font-semibold">
            Crear Módulo
        </div>
        <div class="mb-3">
            <div class="grid grid-cols-2 gap-x-4 gap-y-4">
                <div>
                    @include('layouts.style.input_text', [
                        'id' => 'CM_nombre',
                        'labelText' => 'Nombre',
                    ])
                </div>
                <div>
                    @include('layouts.style.input_text', [
                        'id' => 'CM_url',
                        'labelText' => 'URL',
                    ])
                </div>
                <div class="col-span-2">
                    @include('layouts.style.textarea', [
                        'id' => 'CM_descripcion',
                        'labelText' => 'Descripción',
                    ])
                </div>
                <div>
                    @include('layouts.style.input_checkbox', [
                        'id' => 'CM_esprincipal',
                        'labelText' => 'Es principal',
                        'value' => 1,
                    ])
                </div>
                <div>
                    @include('layouts.style.select_native', [
                        'id' => 'CM_modulopadre',
                        'labelText' => 'Padre',
                        'data' => $modulos,
                    ])
                </div>
            </div>
        </div>
        <div class="flex flex-row-reverse space-x-2 space-x-reverse">
            <div>
                <button type="button" onclick="crearModulo()" class="btn-accept">
                    Aceptar
                </button>
            </div>
            <div>
                <button type="button" wire:click="$emit('closeModal')" class="btn-cancel">
                    Cancelar
                </button>
            </div>
        </div>
    </div>

    <script>
        setOnChangeSelectNative('CM_esprincipal', function() {
            if (isChecked('CM_esprincipal')) {
                disableSelectNative('CM_modulopadre');
            } else {
                enableSelectNative('CM_modulopadre');
            }
        });
    </script>
</div>
