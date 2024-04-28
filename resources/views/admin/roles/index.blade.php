<x-colabors-layout>
    <h1 class="text-2xl font-bold ">Lista de Roles</h1>
    <hr class="mt-2 mb-6">

    <x-table-responsive>

        <div class="px-4 py-4 flex justify-end">
            <a class="btn btn-danger ml-2" href="{{route('roles.create')}}">Crear un rol</a>
        </div>

            @if ($roles->count())  
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($roles as $role)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            {{-- @isset($course->image)
                                                <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
                                            @else --}}
                                                <img class="h-10 w-10 rounded-full object-cover object-center" src="https://images.pexels.com/photos/4974360/pexels-photo-4974360.jpeg?cs=srgb&dl=pexels-cottonbro-4974360.jpg&fm=jpg" alt="">
                                            {{-- @endisset --}}
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{$role->id}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{-- <div class="text-sm text-gray-900">{{$course->students->count()}}</div> --}}
                                    <div class="text-sm text-gray-900">{{$role->name}}</div> 
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{route('roles.edit', $role)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    {{-- <a  class="text-indigo-600 hover:text-indigo-900">Edit</a> --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay ningun rol registrado
                </div>
            @endif
    

            {{-- <div class="px-6 py-4">
                {{$persons->links()}}
            </div> --}}
    </x-table-responsive>

    <x-slot name="js">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (session('info') == 'ok')
        <script>
            Swal.fire(
                'Rol Registrado!',
                'el rol se registro correctamente!',
                'success'
            )
        </script>
        @endif
    </x-slot>

</x-colabors-layout>