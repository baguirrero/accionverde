<div>
    <x-table-responsive>
        {{-- <div class="px-6 py-4 flex">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control rounded-lg flex-1 shadow-md" placeholder="Ingrese el nombre de la persona o email registrado">
        </div> --}}

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datos Personales</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">DNI/Telefono</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tiempo Transcurrido</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($cases as $case)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            {{-- @isset($course->image)
                                                <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
                                            @else --}}
                                                <img class="h-10 w-10 rounded-full object-cover object-center" src="https://images.pexels.com/photos/414628/pexels-photo-414628.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                            {{-- @endisset --}}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{$case->names}} {{$case->ape_pater}} {{$case->ape_mater}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{-- <div class="text-sm text-gray-900">{{$course->students->count()}}</div> --}}
                                    <div class="text-sm text-gray-900">{{$case->dni}}/{{$case->phone}}</div> 
                                </td>

                                {{-- <td class="px-6 py-4 whitespace-nowrap"> --}}
                                    {{-- <div class="text-sm text-gray-900">{{$course->students->count()}}</div> --}}
                                    {{-- <div class="text-sm text-gray-900">{{$user->roles()->name}}</div>  --}}
                                {{-- </td> --}}

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{-- <div class="text-sm text-gray-900">{{$course->students->count()}}</div> --}}
                                    <div class="text-sm text-gray-900">{{$case->email}}</div> 
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{-- <div class="text-sm text-gray-900">{{$course->students->count()}}</div> --}}
                                    <div class="text-sm text-gray-900">{{$case->dias_transcurridos}} dias y {{\Carbon\Carbon::parse($case->tiempo_trans)->format('H:i:s')}}</div> 
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

    </x-table-responsive>
</div>
