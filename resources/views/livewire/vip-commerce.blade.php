<div>
    {{-- seccion de la vista aliados comerciales vip --}}

    <section class="container py-8">

        <div class="py-8 ">
            <div class="flex items-center justify-between block">

                <span class="flex text-xs text-center text-gray-700 uppercase md:text-2xl ">
                    Disfruta de la compañia y servicios de nuestros commercios vip 
                </span>

                <div class="flex-1 w-full h-2 mx-6 bg-gray-400 rounded-full ">
                </div>

            </div>
        </div>

        @foreach ($claims as $item)
            <article class="mb-4 shadow-lg" @if ($loop->first)

                x-data="{ open: true }"
            @else

                x-data="{ open: false }"

        @endif>

        <header class="flex items-center justify-between px-4 py-2 bg-gray-200 rounded shadow-lg cursor-pointer " x-on:click="open= !open">
            <div class="text-xs font-bold text-gray-800 uppercase md:text-2xl">

                <span class="inline-block w-8 mr-2 text-center">
                    {!! $item->icon !!}
                </span>

                {{ $item->name }}
                 
            </div>
            {{--<a class="ml-2 font-semibold hover:text-gray-800 text-gold hover:underline"
                    href="{{ route('commerces.show', $item)}}">Ver más
            </a>--}}
        </header>
        {{-- seccion de barras  grises  para abrir y cerrar la seccion --}}
        <div class="px-4 py-2 card" x-show="open">
            <ul class="grid grid-cols-1 gap-2">

                @livewire('commerce-products', ['item' => $item])

            </ul>
        </div>

        </article>

        @endforeach

    </section>

    @push('script'){{-- scrip utilizado por el slider de Flex-Slider --}}
        <script>
            Livewire.on('glidertwo', function(id) {

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

</div>