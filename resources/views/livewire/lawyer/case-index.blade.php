<div class="container py-8">

    <x-table-responsive>

        <div class="px-6 py-4 flex">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control flex-1 shadow-md" placeholder="Ingrese el apellido paterno de la persona del caso">
    
            <a class="btn btn-danger ml-2" href="#">Busqueda</a>
    
        </div>

        @if ($cases->count())  
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">DNI/Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profesion</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
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
                                        <div class="text-sm font-medium text-gray-900">{{$case->names}}</div>
                                        <div class="text-sm text-gray-500">{{$case->ape_pater}}  {{$case->ape_mater}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{-- <div class="text-sm text-gray-900">{{$course->students->count()}}</div> --}}
                                <div class="text-sm text-gray-900">{{$case->dni}}</div> 
                                <div class="text-sm text-gray-500">{{$case->email}}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center">
                                    {{$case->profession->name}}
                                </div>
                                <div class="text-sm text-gray-500">{{$case->nacionalidad}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($case->status)
                                    @case(1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"> Registrado </span>
                                        @break
                                    @case(2)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800"> Asignado </span>
                                        @break
                                    @case(3)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-green-800"> En Proceso </span>
                                        @break
                                    @case(4)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Resuelto </span>
                                        @break
                                    @default
                                    
                                        
                                @endswitch

                            
                                
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route('cases.edit', $case)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                {{-- <a  class="text-indigo-600 hover:text-indigo-900">Edit</a> --}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente
            </div>
        @endif
        

        <div class="px-6 py-4">
            {{$cases->links()}}
        </div>
    </x-table-responsive>
</div>
