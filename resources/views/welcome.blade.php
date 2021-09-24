<x-app-layout>

    <div class="container py-8">

        @foreach ($categories as $category)

            <section class="py-4">

                <div class="flex items-center mb-2">
                    
                    <h1 class="py-2 text-lg font-semibold text-gray-700 uppercase">
                        {{ $category->name }}
                    </h1>

                    <a class="ml-2 font-semibold hover:text-gray-800 text-gold hover:underline" href="{{route('categories.show', $category)}}">Ver más</a>
                </div>

                @livewire('category-products', ['category' => $category])

            </section>

        @endforeach

    </div>

    @push('script')
        <script>
            Livewire.on('glider', function(id) {

                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                            breakpoint: 640,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3.5,
                                slidesToScroll: 3,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4.5,
                                slidesToScroll: 4,
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 5.5,
                                slidesToScroll: 5,
                            }
                        },
                    ]
                });

            });
        </script>
    @endpush

</x-app-layout>
