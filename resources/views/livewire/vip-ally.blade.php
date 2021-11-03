<div>

    {{-- seccion de la vista aliados comerciales vip --}}
    <section class="container py-8">

        <div class="py-8 "> {{-- texto  --}}
            <div class="flex items-center justify-between block">

                <span class="flex text-xs text-center text-gray-700 uppercase md:text-2xl ">
                    Conoce a nuestros aliados comerciales Vip
                </span>

                <div class="flex-1 w-full h-2 mx-6 bg-gray-400 rounded-full ">
                </div>

            </div>
        </div>

        @forelse ($claims as $claim){{--  itera el foreach.. la condicional @if agrega la propiedad de alpine x-data= open:false a cada registro encontrado excepto al primero. --}}
            <article class="mb-4 shadow-lg" @if ($loop->first)

                x-data="{ open: true }"
            @else

                x-data="{ open: false }"

        @endif
        >

                {{-- header desplegable con los detalles de los productos de los aliados comerciales. --}}
        <header class="flex items-center justify-between px-4 py-2 bg-gray-200 rounded shadow-lg cursor-pointer "
            x-on:click="open= !open">
            <div class="text-xs font-bold text-gray-800 uppercase md:text-2xl">

                <span class="inline-block w-8 mr-2 text-center">
                    {!! $claim->icon !!}
                </span>

                {{ $claim->name }}

            </div>
            <a class="ml-2 font-semibold hover:text-gray-800 text-gold hover:underline"
                href="{{ route('claims.show', $claim) }}">Ver más
            </a>
        </header>{{-- end header --}}

        {{-- card de productos correspondiente a los aliados comerciales vip --}}
        <div class="px-4 py-4" x-show="open">
            <ul class="grid grid-cols-1 gap-2">

                @livewire('ally-products', ['claim' => $claim])

            </ul>
        </div>

        </article>

        @empty

        <div class="relative flex items-center justify-start px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
            role="alert">

            <strong class="items-center font-bold text-center"> <img class="mr-2"
                    src="https://img.icons8.com/dusk/64/000000/sad-ghost.png" /> Upss!</strong>
            <span class="flex ml-2 font-semibold">Los Productos De Este Aliado Comercial Vip Se Agotaron.</span>

        </div>

    @endforelse
    </section>

    @push('script'){{-- scrip utilizado por el slider de glider --}}
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

</div>

{{-- <section class="container py-8">

    @foreach ($claims as $claim)

        <section class="py-4">

            <div class="flex items-center mb-2">

                <h1 class="py-2 text-lg font-semibold text-gray-700 uppercase">
                    {{ $claim->name }}
                </h1>

                <a class="ml-2 font-semibold hover:text-gray-800 text-gold hover:underline"
                    href="{{ route('claims.show', $claim) }}">Ver más</a>
            </div>

            @livewire('ally-products', ['claim' => $claim])

        </section>

    @endforeach

</section> --}}
