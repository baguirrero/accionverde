<x-colabors-layout>
    <h1 class="text-2xl font-bold ">Asignar Rol</h1>
    <hr class="mt-2 mb-6">

    {!! Form::label('name', 'Nombre') !!}

    {!! Form::text('name', $user->name, ['class'=>'form-input rounded-lg w-full', 'readonly']) !!}
    <hr class="mt-2 mb-6">

    {!! Form::label('roles', 'Lista de Roles', ['class'=>'mt-2']) !!}

    {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $rol)
                    <div>
                        <label >
                            {!! Form::checkbox('roles[]', $rol->id, null, ['class' => 'mr-1']) !!}
                            {{$rol->name}}
                        </label>
                    </div>
                @endforeach

                {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-4']) !!}
    {!! Form::close() !!}

    <x-slot name="js">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (session('asing') == 'ok')
        <script>
            Swal.fire(
                'Rol Asignado!',
                'Se asigno el rol al usuario correctamente!',
                'success'
            )
        </script>
        @endif
    </x-slot>

</x-colabors-layout>