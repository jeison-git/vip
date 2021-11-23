<div class="p-6 mb-4 bg-white rounded-lg shadow-xl"> {{-- Componente estado del producto borrador o publicado --}}
    <p class="mb-2 text-2xl font-semibold text-center">Estado de la  Solicitud</p>

    <div class="flex">
        <label class="mr-6">
            <input wire:model.defer="status" type="radio" name="status" value="1">
            Marcar su solicitud como borrador
        </label>
        <label>
            <input wire:model.defer="status" type="radio" name="status" value="2">
            Solicitar la revisión de su solicitud
        </label>
    </div>

    <div class="flex items-center justify-end">

        <x-jet-action-message class="mr-3" on="saved">
            Actualizado
        </x-jet-action-message>

        <x-jet-button wire:click="save"
            wire:loading.attr="disabled"
            wire:target="save">
            Enviar solicitud
        </x-jet-button>
    </div>
</div>  
