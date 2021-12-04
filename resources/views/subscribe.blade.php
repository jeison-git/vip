<x-app-layout>

    <div class="w-full py-12 bg-red-500">

        @error('message')
            <div class="mt-4 text-center invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror

        <!-- planes o afiliaciones -->
        <section class="container relative flex items-center h-screen px-12">

            <div class="grid gap-6 md:grid-cols-12 ">

                <div class="col-span-12 md:col-span-12 lg:col-span-8 xxl:col-span-12">
                    <div class="w-full">
                        <h1 class="my-8 text-2xl font-bold text-white md:text-7xl"> Suscríbete <br>
                            A Nuestros Planes y <span class="text-blue-400"> Disfruta al máximo de las mejores
                                ofertas</span></h1>
                        <p class="text-lg font-semibold text-white ">¡Todo Lo Que Quieres Y Necesitas Aquí Lo
                            Consigues!.
                        </p>
                    </div>
                </div>

            </div>

        </section>

        <!-- cliente vip -->
        <section class="container h-full bg-yellow-300">

            <div class="relative px-8 py-8 mt-4">
                <div>
                    <h1 class="mt-8 text-2xl font-bold text-white md:text-7xl">
                        CLIENTE <span class="px-4 py-4 text-2xl bg-blue-400 rounded-full md:text-7xl">VIP</span>
                    </h1>
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-12 md:px-8 md:py-8 ">

                <div class="col-span-8 md:col-span-12 xl:col-span-5">
                    <div class="py-4">

                        <p class="font-semibold text-blue-900 md:text-lg"><span
                                class="font-bold text-red-400">01-</span>
                            GRATIFICANTES <span class="font-bold">EXPERIENCIAS DE USUARIO</span></p>
                        <p class="text-sm text-justify text-blue-900 md:pl-8 md:font-semibold">Su cuenta
                            Cliente Vip le
                            permite utilizar toda la gama de nuestros servicios, con tan solo una cuota al año
                            podrá comprar nuestros productos y disfrutar de los mejores descuentos que solo
                            lo obtendrá aquí, en Meganegocios VIP.
                            Además podrá acceder a nuestros beneficios, en los establecimientos y/o comercios
                            aliados
                            a Meganegoios VIP.
                        </p>

                    </div>

                    <div class="py-4">
                        <p class="font-semibold text-blue-900 md:text-lg"><span
                                class="font-bold text-red-400">02-</span>
                            MEGA <span class="font-bold">DESCUENTOS CLIENTE VIP</span></p>
                    </div>

                    <div class="py-4">
                        <p class="font-semibold text-blue-900 md:text-lg"><span
                                class="font-bold text-red-400">03-</span>
                            CREDENCIALES <span class="font-bold">CLIENTE VIP</span></p>
                    </div>

                    <div class="py-4">
                        <p class="font-semibold text-blue-900 md:text-lg"><span
                                class="font-bold text-red-400">04-</span>
                            SOPORTE <span class="font-bold">JUSTO CUANDO LO NECESITES </span></p>
                    </div>

                </div>

                <div class="flex justify-center col-span-7 lg:col-span-7 xxl:col-span-7">
                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/male-employee-looking-at-customer-review-2937682-2426381.png"
                        class="w-auto" />
                </div>

            </div>

        </section>

        <!-- comercio vip y aliados -->
        <section class="container h-full bg-yellow-300">

            <div class="grid grid-cols-12 gap-0">

                <div
                    class="h-full col-span-12 px-12 py-6 bg-red-500 md:col-span-12 sm:col-span-6 lg:col-span-6 xxl:col-span-6">
                    <div>
                        <img src="https://ouch-cdn2.icons8.com/c_sJhjs8JZ9WhtxfMnw0Eh2FpwIsj4VukdWjkjOiJqw/rs:fit:784:784/czM6Ly9pY29uczgu/b3VjaC1wcm9kLmFz/c2V0cy9wbmcvMjEx/LzZkY2MyYWU2LWU5/MDYtNDJjNC05Yzk3/LTBiYjliMDgxOGMz/MC5wbmc.png"
                            class="-ml-4 w-52" />
                        <h1 class="mb-2 text-2xl font-semibold text-white md:text-5xl">COMERCIO VIP</h1>

                        <p class="text-sm text-justify text-white md:pl-8 md:font-semibold">El plan de afiliación
                            Comercio Vip con tan solo una cuota al año, le permite publicar todos sus productos o
                            servicios en la Mega Tienda Virtual
                            Vip.
                        </p>

                        <a href="{{ route('contacts.index') }}">
                            <div class="bottom-0 left-0 px-6 py-2">
                                <div class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-400 h-7 w-7" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-white underline cursor-pointer">para más información...
                                    </p>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <div
                    class="h-full col-span-12 px-12 py-6 mb-12 bg-blue-400 sm:col-span-12 md:col-span-6 lg:col-span-6 xxl:col-span-6">
                    <div>

                        <img src="https://assets.materialup.com/uploads/641e0e0f-eddf-4d2c-b0ee-c6f55300bb1b/preview.png"
                            class="-ml-10 w-52" />

                        <h1 class="mb-2 text-2xl font-semibold text-white md:text-5xl">ALIADOS COMERCIALES VIP</h1>

                        <p class="text-sm text-justify text-white md:pl-8 md:font-semibold">Ofrecemos la oportunidad
                            a
                            los pequeños y mediados comercios, de afiliarse a una selecta comunidad de Aliados
                            Comerciales Vip, donde el principal objetivo es recuperar lo perdido en relación con sus
                            ventas. Si deseas mejorar tus ventas solicita tu afiliación.
                        </p>

                        <a href="{{ route('contacts.index') }}">
                            <div class="bottom-0 left-0 px-6 py-2">
                                <div class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-400 h-7 w-7" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-white underline cursor-pointer">para más información...
                                    </p>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

            </div>

        </section>

        <div class="h-12 bg-yellow-300"></div>

        <section class="container py-14">

            <h3 class="text-2xl tracking-widest text-center text-white ">Afíliaciones flexibles</h3>

            <h1 class="mt-8 text-xl font-bold text-center text-white md:text-5xl"> Elija un afiliacion que funcione
                mejor para
                usted. </h1>

            <div>
                <form action="{{ route('subscribe.store') }}" method="POST" id="paymentForm">
                    @csrf

                    <!-- Box -->
                    <div class="md:flex md:justify-center md:space-x-8 md:px-14">

                        <!-- box-1 -->
                        @foreach ($plans as $plan)
                            <div
                                class="w-auto px-4 py-4 mx-auto mt-16 transition duration-500 transform bg-white shadow-lg rounded-xl hover:shadow-xl hover:scale-110 md:mx-0">


                                <div class="w-sm">

                                    <div class="flex justify-center mt-4 font-extrabold leading-none md:text-4xl">
                                        {{ $plan->visual_price }}
                                        <span class="pt-8 ml-1 text-2xl font-medium leading-8 text-gray-600 md:">
                                            /12 meses
                                        </span>
                                    </div>

                                    <div class="mt-4 text-center text-gray-800">

                                        <h1 class="text-xl font-bold uppercase">{{ $plan->slug }}</h1>

                                        <p class="mt-4 text-gray-800">El precio podría variar, debido a cargos de
                                            terceros.</p>

                                        <input type="radio" name="plan" value="{{ $plan->slug }}" required
                                            class="items-center py-2 mt-8 mb-4 tracking-widest text-yellow-300 transition duration-200 bg-white rounded-full px-14 hover:bg-yellow-300">
                                        {{-- </input> --}}

                                    </div>


                                </div>


                            </div>
                        @endforeach

                    </div>


                    @if ((optional(auth()->user())->hasActiveSubscription()) || auth()->user()->subscription )

                        <div class="mt-8 font-medium text-center text-gray-800 card">
                            <div class="capitalize card-body">
                                Si ya eres parte de la Comunidad Clientes vip Disfruta al máximo aquí encontrarás
                                todos los recursos que necesitas.
                            </div>
                        </div>

                    @else

                        <div id="toggler"
                            class="col-span-12 mt-4 sm:col-span-12 md:col-span-5 lg:col-span-5 xxl:col-span-5 form-group">
                            <!-- Start Card List -->
                            <div data-toggle="buttons">

                                <label>Seleccione la plataforma de pago deseada:</label>

                                <div class="flex items-center justify-center p-3 mt-4 font-semibold text-center bg-white shadow-xl rounded-xl">
                                    Puede realizar el pago en efectivo, pago móvil o punto de venta. <br>
                                    Dirigiéndose a uno de nuestros Aliados Comerciales Vip o <br>
                                    comunicándose con nosotros a través de los canales disponibles.
                                    </div>

                                @foreach ($paymentPlatforms as $paymentPlatform)

                                    <div class="flex items-center justify-center p-3 mt-4 bg-white shadow-xl rounded-xl"
                                        data-target="#{{ $paymentPlatform->name }}Collapse" data-toggle="collapse">

                                        <div class="flex items-center space-x-6">

                                            <img src="{{ asset($paymentPlatform->image) }}" class="w-auto h-12" />

                                            <div>

                                                <input type="radio" name="payment_platform"
                                                    value="{{ $paymentPlatform->id }}" required
                                                    class="items-center px-8 py-2 mt-8 mb-4 tracking-widest text-yellow-300 transition duration-200 bg-white rounded-full hover:bg-yellow-300">
                                                {{-- </input > --}}

                                            </div>

                                        </div>

                                    </div>

                                @endforeach
                            </div>

                            @foreach ($paymentPlatforms as $paymentPlatform)
                                <div id="{{ $paymentPlatform->name }}Collapse"
                                    class="mt-2 text-xs text-center collapse" data-parent="#toggler">
                                    @includeIf('components.' . strtolower($paymentPlatform->name) .
                                    '-collapse')
                                </div>
                            @endforeach

                            <!-- End Card List -->
                        </div>


                        <div class="mt-3 text-center">
                            <x-components.button type="submit" id="payButton"> Suscríbete </x-components.button>
                        </div>
                    @endif

                </form>
            </div>

        </section>


    </div>

</x-app-layout>
