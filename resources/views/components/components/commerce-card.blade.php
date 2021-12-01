@props(['claim']){{-- Card de comercios afiliados usado en el home --}}

<div class="flex items-center justify-between p-3 mt-4 bg-white shadow-xl rounded-xl">

    <div class="flex items-center space-x-6">
        <figure class="w-auto h-12"> {!! $claim->icon !!}</figure>
         <div>
             <p class="text-base font-semibold">{{ $claim->name }}</p>
         </div>              
     </div>
     
     <div class="flex items-center space-x-2">
        <a class="" href="{{ route('claims.show', $claim) ?? null}}" title="Heading Link">
         <div class="flex items-center p-2 bg-yellow-200 rounded-md">
             <p class="text-xs font-semibold text-yellow-600">Visitar</p>
         </div>
        </a>
     </div> 

</div>

