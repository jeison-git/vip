<div>

    <header class="bg-white shadow"> {{-- Cabezera --}}
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">

                <h1 class="flex items-center font-semibold leading-tight text-gray-800 md:text-2xl">

                    <a href="{{ route('admin.subscriptions.index') }}" class="mr-2"><img
                            src="https://img.icons8.com/dusk/25/000000/pancake.png" />
                        <a href="{{ route('admin.subscriptions.create') }}" class="mr-2"><img
                                src="https://img.icons8.com/dusk/25/000000/plus-2-math.png" /></a>Suscripciones
                </h1>

                <x-jet-danger-button wire:click="$emit('deleteSubscription')">{{-- problemas para eliminar --}}
                    Eliminar
                </x-jet-danger-button>

            </div>
        </div>
    </header>

    <div class="max-w-4xl px-4 py-12 mx-auto text-gray-700 sm:px-6 lg:px-8">

        <h1 class="mb-8 text-3xl font-semibold text-center">Complete esta información para editar una suscripción</h1>

        <div class="p-6 bg-white rounded-lg shadow-xl">

            {{-- Active Until --}}
            <div class="mb-4">
                <x-jet-label value="Fecha de Validación" />

                {{-- <x-jet-input type="timestamp" class="w-full" disabled wire:model="subscription.active_until"/> --}}
                <div class="w-full">{{$subscription->active_until}}</div>

                <x-jet-input type="datetime-local" class="w-full" wire:model="subscription.active_until"/>

                <x-jet-input-error for="subscription.active_until" />

            </div>

            <div class="grid grid-cols-2 gap-6 mb-4">

                {{-- usuario --}}
                <div wire:ignore>

                    <x-jet-label value=" ID Usuario" />

                    <select class="w-full form-control" id="select2" wire:model="subscription.user_id">

                        <option value="" selected disabled>Seleccione un ID Usuario</option>

                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} | {{ $user->email }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="subscription.user_id" />

                </div>

                {{-- plano --}}
                <div>
                    <x-jet-label value=" ID Plan" />
                    <select class="w-full form-control" wire:model="subscription.plan_id">
                        <option value="" selected disabled>Seleccione un ID Plan</option>

                        @foreach ($plans as $plan)
                            <option value="{{ $plan->id }}">{{ $plan->slug }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="subscription.plan_id" />
                </div>

            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-action-message class="mr-3" on="saved">
                    Actualizado
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Actualizar Suscripción
                </x-jet-button>
            </div>
        </div>

        
    </div>

    {{-- Scripts --}}
    @push('script')
        <script>

            Livewire.on('deleteSubscription', () => {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.edit-subscription', 'delete');

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            })

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
