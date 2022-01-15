<div class="container"> 

    <div class="max-w-5xl py-4 mx-auto lg:px-8">{{-- componente para calificar una orden de compra --}}

        <div class="flex items-center px-6 py-4 mb-6 bg-white rounded-lg shadow-lg md:px-12">{{-- formulario comment and rating --}}

            <div class="w-full mt-16 md:mt-0">
                <div
                    class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">

                    <div class="w-full space-y-5 text-center text-gray-700">
                        <p class="text-sm font-medium tracking-wider uppercase">
                            Tu calificación es de mucha importancia para nosotros
                        </p>
                        <p class="text-xs"> por favor comentanos tu experiencia de compra </p>
                    </div>

                    @if (session()->has('message'))
                        <p class="mt-2 text-xs text-gray-500 md:pr-16">
                            'Muchas gracias, es importante para nosotros saber tu valoración'
                        </p>
                    @endif

                    @if ($hideForm != true) {{-- una ves guardado ocultar formulario --}} 
                        
                        <form wire:submit.prevent="rate()">

                            <div class="block px-1 py-2 mx-auto md:max-w-3xl">{{-- card comentario y calificacion --}}

                                <div class="my-5">{{-- text-area comentario --}}

                                    @error('comment')
                                        <p class="mt-1 text-red-500">{{ $message }}</p>
                                    @enderror

                                    <textarea wire:model.lazy="comment" name="description" {{-- comentario --}}
                                        class="block w-full px-4 py-3 border rounded-lg focus:border-blue-500 focus:outline-none"
                                        placeholder="Comentanos tu experiencia ..">
                                    </textarea>

                                </div>

                                <div class="flex items-center justify-center mb-2 rating">{{-- calificacion --}}

                                    <ul class="flex">
                                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)">
                                            <i
                                                class="fas fa-star text-{{ $rating >= 1 ? 'yellow' : 'gray' }}-300"></i>
                                        </li>
                                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)">
                                            <i
                                                class="fas fa-star text-{{ $rating >= 2 ? 'yellow' : 'gray' }}-300"></i>
                                        </li>
                                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)">
                                            <i
                                                class="fas fa-star text-{{ $rating >= 3 ? 'yellow' : 'gray' }}-300"></i>
                                        </li>
                                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)">
                                            <i
                                                class="fas fa-star text-{{ $rating >= 4 ? 'yellow' : 'gray' }}-300"></i>
                                        </li>
                                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)">
                                            <i
                                                class="fas fa-star text-{{ $rating >= 5 ? 'yellow' : 'gray' }}-300"></i>
                                        </li>
                                    </ul>

                                </div>

                                <div class="block">
                                    <button type="submit"
                                        class="w-full px-3 py-4 font-medium text-white bg-blue-500 rounded-lg">
                                        Calificar
                                    </button>
                                </div>

                            </div>

                        </form>

                    @endif

                </div>
            </div>

        </div>

        <section class="flex items-center px-6 py-4 mb-6 bg-white rounded-lg shadow-lg md:px-12">{{-- card- respuesta o comentario del usuario --}}

            <div class="w-full mt-16 md:mt-0">

                <div
                    class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">

                    <div class="w-full space-y-5 text-center text-gray-700"> {{-- etiqueta --}}
                        <p class="text-sm font-medium tracking-wider uppercase">
                            Tu calificación
                        </p>
                    </div>                

                        @forelse ($comments as $comment){{-- recorrer la coleccion rating->comment para buscar calificaciones --}}
                        
                                <article class="grid items-center justify-between grid-cols-1 mb-4">{{-- valoraciones --}}

                                   
                                    <figure class="mb-2 order">
                                        <img class="object-cover w-12 h-12 rounded-full shadow-lg"
                                            src="{{ $comment->user->profile_photo_url ?? null }}" alt="">
                                    </figure>

                                    <div class="order-1">
                                        <p class="flex items-center text-xs">
                                            <b class="mr-1 text-gray-800">{{ $comment->user->name ?? null }}</b>
                                            <i class="text-yellow-300 fas fa-star"></i> ({{ $comment->rating }})&nbsp;  
                                            @auth
                                                @if (auth()->user()->id == $comment->user_id || auth()->user()->role->name == 'admin')
                                                    <a wire:click.prevent="delete({{ $comment->id }})"
                                                        class="text-sm underline cursor-pointer hover:text-red-600">Delete</a>
                                                @endif
                                            @endauth
                                        </p>

                                        <div class="items-center flex-1 w-full text-xs tracking-wider uppercase card-body">                                            
                                            {{ $comment->comment }}
                                        </div>
                                    </div>
                                

                                </article>
                        @empty
                            <div class="flex col-span-1 mt-2">
                                <div class="relative px-4 py-4 leading-6 text-center">
                                    <div class="text-xs font-medium tracking-wider text-gray-600 uppercase">
                                        No has comentado sobre esta orden de compra
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    
                </div>

        </section>

    </div>

</div>
