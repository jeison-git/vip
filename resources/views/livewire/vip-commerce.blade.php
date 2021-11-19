<div>
    {{-- seccion de la vista aliados comerciales vip --}}
    <!-- component -->
    <div class="container object-fill h-auto px-10 py-24 mt-12 text-white bg-center bg-cover rounded-full "
        style="background-image: url(https://images.unsplash.com/photo-1494253109108-2e30c049369b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=870&q=80)">
        <div class="md:w-1/2">
            <p class="text-sm font-bold uppercase md:text-2xl">Permite a nuestros usuarios conocerte</p>
            <p class="font-bold md:text-2xl">Invierte en tu publicidad</p>
            <p class="mb-10 leading-none md:text-2xl">Meganegocios Vip esta aquí para ser tu aliado y ayudarte a aumentar tus ventas.</p>
            
        </div>
    </div>

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

        <header class="flex items-center justify-between px-4 py-2 bg-gray-200 rounded shadow-lg cursor-pointer "
            x-on:click="open= !open">
            <div class="text-xs font-bold text-gray-800 uppercase md:text-2xl">

                <span class="inline-block w-8 mr-2 text-center">
                    {!! $item->icon !!}
                </span>

                {{ $item->name }}

            </div>
            <a class="ml-2 font-semibold hover:text-gray-800 text-gold hover:underline"
                    href="{!! $item->url !!}">Visitar
            </a>
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
