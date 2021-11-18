<x-admin-layout>    
        
    <div class="container py-12">{{--función para añadir roles livewire/components--}}
        @livewire('admin.create-role')
    </div>

    @push('script')
        <script>
            Livewire.on('deleteRole', roleId => {
            
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

                        Livewire.emitTo('admin.create-role', 'delete', roleId)

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            });
        </script>
    @endpush

</x-admin-layout>