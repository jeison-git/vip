<div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px-8">

    <h1 class="flex items-cente">
        <a href="{{ route('admin.subscriptions.index') }}" class="mr-2"><img
                src="https://img.icons8.com/dusk/25/000000/pancake.png" />
            <a href="{{ URL::previous() }}" class="mr-2"><img
                    src="https://img.icons8.com/dusk/25/000000/circled-right-2.png" /></a>
    </h1>

    <h1 class="mb-8 text-3xl font-semibold text-center">Complete esta información para crear una Suscripción</h1>

    <div class="p-6 bg-white rounded-lg shadow-xl">

        {{-- Active Until --}}
        <div class="mb-4">
            <x-jet-label value="Fecha de Validación o Creación" />

            <x-jet-input type="datetime-local" class="w-full" wire:model="active_until" />

            <x-jet-input-error for="active_until" />

        </div>

        <div class="grid grid-cols-2 gap-6 mb-4">

            {{-- usuario --}}
            <div wire:ignore>

                <x-jet-label value=" ID Usuario" />

                <select class="w-full form-control" id="select2" wire:model="user_id">

                    <option value="" selected disabled>Seleccione un ID Usuario</option>

                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} | {{ $user->email }}</option>
                    @endforeach
                </select>

                <x-jet-input-error for="user_id" />

            </div>

            {{-- plano --}}
            <div>
                <x-jet-label value=" ID Plan" />
                <select class="w-full form-control" wire:model="plan_id">
                    <option value="" selected disabled>Seleccione un ID Plan</option>

                    @foreach ($plans as $plan)
                        <option value="{{ $plan->id }}">{{ $plan->slug }}</option>
                    @endforeach
                </select>

                <x-jet-input-error for="plan_id" />
            </div>

        </div>

        <div class="flex mt-4">
            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="ml-auto">
                Crear Suscripción
            </x-jet-button>
        </div>
    </div>

    @push('scripts')

        <script>
            $(document).ready(function() {
                $('#select2').select2();
                $('#select2').on('change', function(e) {
                    var item = $('#select2').select2("val");
                    @this.set('viralSongs', item);
                });
            });
        </script>

    @endpush

</div>
