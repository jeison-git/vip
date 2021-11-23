<x-app-layout :application="$application">{{-- vista para visualizar la respuesta a una solicitud de empleo --}}

    <div class="relative bg-center bg-no-repeat bg-cover"
        style="background-image: url(https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80);">

        <div class="container relative z-10 flex items-center justify-between">
            
            <a href="{{ route('job-application') }}" class="mt-8 mr-2">
                <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" />
            </a>

        </div>

        <div class="absolute inset-0 opacity-75 bg-gradient-to-b from-green-500 to-green-400"></div>

        <div class="justify-center min-h-screen mx-0 sm:flex sm:flex-row">

            <div class="relative z-10 flex flex-col self-center p-10 md:max-w-3xl">

                <div class="flex-col self-start text-white lg:flex">

                    <img src="" class="mb-3">

                    <strong class="mb-3 font-bold text-left md:text-3xl">Hola {{ Auth::user()->name }}, esperamos que
                        esta respuesta sobre tu Empleo Vip sea de tu agrado.</strong>

                    <p class="pr-3 font-semibold text-justify">{!! $application->application->body !!}</p>{{-- message /application --}}

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
