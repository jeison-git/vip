<x-admin-layout>
    
    <div class="container py-12">
        @livewire('admin.create-commerce')
    </div>

    @push('script')
        <script>
            Livewire.on('deleteCommerce', commerceSlug => {
            
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

                        Livewire.emitTo('admin.create-commerce', 'delete', commerceSlug)

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