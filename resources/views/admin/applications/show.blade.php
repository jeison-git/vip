<x-admin-layout>
    {{-- imagen de presentacion y detalles del curso --}}
    <section class="px-6 py-12 mb-12 bg-gray-400 shadow-lg">
        
        <div class="flex items-center justify-between">
            
            <a href="{{ route('admin.applications.index') }}" class="mr-2">
                <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" />
            </a>

        </div>  

        <div class="container grid grid-cols-1 gap-6 lg:grid-cols-2">            

            <figure>                                            

                @if ($application->images->count() ?? null)
                    <img class="object-contain object-center w-full h-96" src="{{ Storage::url($application->images->first()->url)}}" alt="">
                @else
                    <img lass="h-64 w-full object-cover"
                        src="https://cdn.pixabay.com/photo/2015/12/22/04/00/edit-1103599__340.png" alt="">
                @endif

            </figure>

            <div class="text-black">
                <h1 class="text-lg capitalize md:text-4xl">{{ $application->names }}</h1>
                <h2 class="mb-3 uppercase md:text-2xl">{{ $application->surnames }}</h2>
                <h2 class="mb-3 md:text-xl">{{ $application->email }}</h2>
                <p class="mb-2"><i class="fas fa-calendar-alt"></i> Fecha de la solicitud:
                    {{ $application->created_at }}</p>
            </div>

        </div>
    </section>

    {{-- - --}}
    <div class="container grid grid-cols-1 gap-6 md:grid-cols-3">

        @if (session('info'))
            <div class="md:col-span-3" x-data="{open: true}" x-show="open">
                <div class="relative px-4 py-3 leading-normal text-red-800 bg-red-200 border border-red-300 rounded-lg"
                    role="alert">
                    <span class="absolute inset-y-0 left-0 flex items-center ml-2">
                        <svg x-on:click="open=false" class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20">
                            <path
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </span>
                    <p class="ml-6 text-center">{{ session('info') }}</p>
                </div>
            </div>
        @endif

        <div class="order-2 md:col-span-2 lg:order-1 md:mb-12">
            {{-- datos del usuario --}}
            <section class="mt-4 mb-6 card">
                <div class="card-body">
                    <h1 class="flex-1 mb-4 ml-4 text-xl font-bold text-black"><i class="fas fa-user"></i> Información
                        personal </h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">


                        <li class="text-base text-gray-600">
                           
                            <div class="flex items-center font-semibold text-center text-gray-800 card">
                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                <div class="capitalize card-body">
                                   Nombres: {{ $application->names }}
                                </div>
                            </div>                           
                        
                        </li>

                        <li class="text-base text-gray-600">
                           
                            <div class="flex items-center font-semibold text-center text-gray-800 card">
                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                <div class="capitalize card-body">
                                   Apellidos: {{ $application->surnames  }}
                                </div>
                            </div>                           
                        
                        </li>

                        <li class="text-base text-gray-600">
                           
                            <div class="flex items-center font-semibold text-center text-gray-800 card">
                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                <div class="card-body">
                                   Correo: {{ $application->email  }}
                                </div>
                            </div>                           
                        
                        </li>

                        <li class="text-base text-gray-600">
                           
                            <div class="flex items-center font-semibold text-center text-gray-800 card">
                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                <div class="capitalize card-body">
                                   N°.Tefn: {{ $application->phone  }}
                                </div>
                            </div>                           
                        
                        </li>

                        <li class="text-base text-gray-600">
                           
                            <div class="flex items-center font-semibold text-center text-gray-800 card">
                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                <div class="capitalize card-body">
                                   Nacionalidad: {{ $application->nationality }}
                                </div>
                            </div>                           
                        
                        </li>

                        <li class="text-base text-gray-600">
                           
                            <div class="flex items-center font-semibold text-center text-gray-800 card">
                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                <div class="capitalize card-body">
                                   Cédula: {{ $application->identification }}
                                </div>
                            </div>                           
                        
                        </li>

                        <li class="text-base text-gray-600">
                           
                            <div class="flex items-center font-semibold text-center text-gray-800 card">
                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                <div class="capitalize card-body">
                                   Estado civil: {{ $application->marital_status }}
                                </div>
                            </div>                           
                        
                        </li>

                        <li class="text-base text-gray-600">
                           
                            <div class="flex items-center font-semibold text-center text-gray-800 card">
                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                <div class="capitalize card-body">
                                   Fecha de nacimiento: {{ $application->date}}
                                </div>
                            </div>                           
                        
                        </li>
                        
                    </ul>

                    <div class="flex items-center font-semibold text-justify text-gray-800 card">
                        <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                        <div class=" card-body">
                           Dirección: {!! $application->address !!}
                        </div>
                    </div>

                </div>
            </section>
            {{-- Datos academicos --}}
            <section class="mb-6 card">
                <div class="card-body">

                    <h1 class="flex-1 mb-4 ml-4 text-xl font-bold text-black">
                        <i class="fas fa-glasses"></i>
                         Datos Acádemicos
                    </h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">

                        <li class="text-base text-gray-600">
                           
                            <div class="flex items-center font-semibold text-center text-gray-800 card">

                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>

                                <div class="capitalize card-body">
                                    Bilingüe: 
                                    @if ($application->bilingue >= 1 ?? null)
                                    <label class="mr-6"><input  name="bilingue" value="1">Si</label>                                    
                                @else
                                <label><input name="bilingue" value="0">No</label>           
                                    
                                @endif

                                </div>

                            </div>                           
                        
                        </li>

                        <li class="text-base text-gray-600">
                           
                            <div class="flex items-center font-semibold text-center text-gray-800 card">
                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                <div class="capitalize card-body">
                                   Nivel Acádemico: {{  $application->academic_level }}
                                </div>
                            </div>                           
                        
                        </li>

                        <li class="text-base text-gray-600">
                           
                            <div class="flex items-center font-semibold text-center text-gray-800 card">
                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                <div class="capitalize card-body">
                                   Profesion: {{  $application->profession }}
                                </div>
                            </div>                           
                        
                        </li>

                        <li class="text-base text-gray-600">
                           
                            <div class="flex items-center font-semibold text-center text-gray-800 card">
                                <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                <div class="capitalize card-body">
                                   Idiomas que domína: {{  $application->languages }}
                                </div>
                            </div>                           
                        
                        </li>
                    </ul>

                    <div class="flex items-center font-semibold text-justify text-gray-800 card">
                        <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                        <div class=" card-body">
                           Estudios Realizados: {!! $application->studies !!}
                        </div>
                    </div>

                    <div class="flex items-center font-semibold text-justify text-gray-800 card">
                        <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                        <div class=" card-body">
                           Cursos Realizados: {!! $application->courses !!}
                        </div>
                    </div>

                    <div class="flex items-center font-semibold text-justify text-gray-800 card">
                        <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                        <div class=" card-body">
                           Habilidades: {!! $application->skills !!}
                        </div>
                    </div>
                    
                </div>
            </section>

            {{-- seccin de temas --}}
            <section class="mt-8 mb-8">
                <h1 class="mb-2 font-bold md:text-3xl">Experiencias Laborales</h1>

                @forelse ($application->oldjobs as $oldjob)
                    <article class="mb-4 shadow-lg" @if ($loop->first)
                        x-data="{ open: true }"
                    @else
                        x-data="{ open: false }"
                @endif>

                <header class="px-4 py-2 bg-gray-400 rounded shadow-lg cursor-pointer" x-on:click="open= !open">
                    <h1 class="text-lg font-bold text-black">{{ $oldjob->name }}</h1>
                </header>
                {{-- seccin de lecciones y barras  grises --}}
                <div class="px-4 py-2 card" x-show="open">
                    <ul class="grid grid-cols-1 gap-2">

                        <div x-show="open">
                            @livewire('employment-experience', ['oldjob' => $oldjob], key($experience->id))
                        </div>

                    </ul>
                </div>

                </article>

            @empty

                <article class="card">
                    <div class="card-body">
                        No hay secciones asignadas
                    </div>
                </article>
                @endforelse
            </section>
            
            {{-- referencias --}}
            <section class="mb-8 card">
                <div class="card-body">
                    <h1 class="mb-4 ml-4 font-bold text-black md:text-xl"><i class="fas fa-dot-circle"></i> Referencias Personales</h1>

                    <ul class="grid grid-cols-1 gap-x-6 gap-y-2">

                        @forelse ($application->references as $reference)
                                    <li class="text-base text-gray-600">
                           
                                        <div class="flex items-center font-semibold text-center text-gray-800 card">
                                            <i class="ml-2 mr-2 text-gray-700 fas fa-check"></i>
                                            <div class="capitalize card-body">
                                               Referencia personal: {{  $reference->name  }}
                                            </div>
                                        </div>                           
                                    
                                    </li>
                        @empty
                            <li class="text-base text-gray-700"></i>No hay referencias personales</li>
                        @endforelse

                    </ul>
                </div>
            </section>         
            

        </div>

        <div class="order-1 mt-4 lg:order-2">
            {{-- targeta para responder solicitud--}}
            <section class="mb-4 card">
                <div class="card-body">

                    <div class="flex items-center">
                        <img class="object-cover w-12 h-12 rounded-full shadow-lg"
                            src="{{ $application->unemployed->profile_photo_url }}"
                            alt="{{ $application->unemployed->name }}">
                        <div class="ml-4">
                            <h1 class="text-lg text-gray-600 font-fold">Solicitante. {{ $application->unemployed->name }}</h1>
                            <a class="text-sm font-bold text-blue-400"
                                href="">{{ '@' . Str::slug($application->unemployed->name, '') }}</a>
                        </div>
                    </div>
                    
                    <x-jet-button  class="w-full mt-4">
                        <a href="{{ route('admin.applications.message', $application) }}" class="text-center">Responder solicitud</a>                        
                    </x-jet-button>

                </div>
            </section>

        </div>

    </div>
</x-admin-layout>
