<div>
    <x-table-responsive>
        <div class="px-6 py-4 flex">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control rounded-lg flex-1 shadow-md" placeholder="Ingrese el nombre de la persona o email registrado">
        </div>

        @if ($users->count())  
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                        <th colspan="2">
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($users as $user)
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
                                            <div class="text-sm font-medium text-gray-900">{{$user->name}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{-- <div class="text-sm text-gray-900">{{$course->students->count()}}</div> --}}
                                    <div class="text-sm text-gray-900">{{$user->email}}</div> 
                                </td>

                                {{-- <td class="px-6 py-4 whitespace-nowrap"> --}}
                                    {{-- <div class="text-sm text-gray-900">{{$course->students->count()}}</div> --}}
                                    {{-- <div class="text-sm text-gray-900">{{$user->roles()->name}}</div>  --}}
                                {{-- </td> --}}

                                <td class="px-6 py-4 whitespace-nowrap">

                                    @if(!empty($user->getRoleNames()))
                                        
                                        @foreach($user->getRoleNames() as $rolName)
                    
                                            <div class="text-sm text-gray-900">{{$rolName}}</div> 
                                        
                    
                                        @endforeach
                                    @endif
                                </td>
                                
                                <td class="px-6 py-4 font-medium" width="10px">
                                    <a href="{{route('users.edit', $user)}}" class="btn btn-success btn-sm">Asignar</a>

                                    {{-- <a href="{{route('users.destroy', $user)}}" class="text-red-600 hover:text-red-900 ml-2">Eliminar</a> --}}
                                    {{-- <a  class="text-indigo-600 hover:text-indigo-900">Edit</a> --}}
                                    <form action="{{route('users.destroy', $user)}}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <a type="submit"></a>
    
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay ningun usuario registrado
                </div>
            @endif

    </x-table-responsive>
</div>
