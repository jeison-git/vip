<div class="p-6 mb-4 bg-white rounded-lg shadow-xl">
    <p class="mb-2 text-2xl font-semibold text-center">Estado del producto</p>

    <div class="flex">
        <label class="mr-6">
            <input wire:model.defer="status" type="radio" name="status" value="1">
            Marcar producto como borrador
        </label>
        <label>
            <input wire:model.defer="status" type="radio" name="status" value="2">
            Marcar producto como publicado
        </label>
    </div>

    <div class="flex items-center justify-end">

        <x-jet-action-message class="mr-3" on="saved">
            Actualizado
        </x-jet-action-message>

        <x-jet-button wire:click="save"
            wire:loading.attr="disabled"
            wire:target="save">
            Actualizar
        </x-jet-button>
    </div>
</div>
