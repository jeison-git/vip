<div class="relative bg-center bg-no-repeat bg-cover" style="background-image: url(https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80);"><div class="absolute inset-0 opacity-75 bg-gradient-to-b from-green-500 to-green-400"></div>
  <div class="justify-center min-h-screen mx-0 sm:flex sm:flex-row">
     
    <div class="relative z-10 flex flex-col self-center p-10 md:max-w-2xl">

        <div class="flex-col self-start text-white lg:flex">
          <img src="" class="mb-3">
          <strong class="mb-3 font-bold md:text-3xl">Hola 👋 Bienvenido a Empleos Vip</strong>
          <p class="pr-3 text-justify">En Meganegocios Vip como empresa comprometida con la innovación, inclusión y sustentabilidad económica. Siempre buscamos apoyar los ingresos de los hogares, 
            en particular para las personas más perjudicadas por la crisis, tratamos de avanzar hacia un nuevo patrón en que converjan las tecnología, formación profesional y capacitación  
            en este nuevo mundo del trabajo. 
            Para promover un crecimiento económico generalizado y la creación de empleos productivos con igualdad de oportunidades,
            todas las solicitudes son valoradas y revisadas según los méritos 
            del solicitante en relación con su perfil profesional con la finalidad de seleccionar a 
            la persona más idónea para el puesto ofertado. </p>
        </div>

      </div>

      <div class="relative z-10 flex self-center justify-center ">

        <div class="p-12 mx-auto bg-white rounded-2xl ">

            <x-components.button-enlace class="w-full text-center md:text-lg" href="{{route('applications.create')}}">
                Agregar solicitud
            </x-components.button-enlace>

            <div class="mt-4 mb-4 ">               
              

              <x-components.table-responsive>
    
                @if ($applications->count())
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    Nombre
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                                    Estado de solicitud
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Editar</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
    
                            @foreach ($applications as $application)
    
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                @if ($application->images->count() ?? null)
                                                    <img class="object-cover w-10 h-10 rounded-full"
                                                        src="{{ Storage::url($application->images->first()->url) }}" alt="">
                                                @else
                                                    <img class="object-cover w-10 h-10 rounded-full"
                                                        src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 capitalize">
                                                    {{ $application->names }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">{{-- Estado del curso si es aprobado o no --}}

                                        @switch($application->status)
                                            @case(1)
                                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                    Borrador
                                                </span>
                                                @break
                                            @case(2)
                                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-500 bg-yellow-300 rounded-full">
                                                    Revisión
                                                </span>
                                                @break
                                            @case(3)
                                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                    Respondido
                                                </span>
                                            @break
                                            @default
                                                
                                        @endswitch
                                        
                                    </td>

                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="{{ route('applications.edit', $application) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                    
                                </tr>
    
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>              
                @endif
            </x-components.table-responsive>
              
            </div>
        </div>

      </div>

  </div>
</div>
