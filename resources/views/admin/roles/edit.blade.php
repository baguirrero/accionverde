<x-colabors-layout>
    <h1 class="text-2xl font-bold ">Editar Rol</h1>
    <hr class="mt-2 mb-6">

    {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-input rounded-lg  block w-full mt-1' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder'=>'Escriba el nombre del rol']) !!}
            @error('name')
                <span class="text-red-600">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <hr class="mt-2 mb-6">
        <strong>Permisos</strong>

        @error('permissions')
            <br>
            <small class="text-red-600">
                <strong>{{$message}}</strong>
            </small>
            <br>
        @enderror

        @foreach ($permissions as $permission)
            
            <div>
                <label>
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1']) !!}
                    {{$permission->name}}
                </label>
            </div>

        @endforeach

        {!! Form::submit('Actualizar rol', ['class'=>'btn btn-primary mt-2']) !!}

    {!! Form::close() !!}


    <x-slot name="js">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (session('update') == 'ok')
        <script>
            Swal.fire(
                'Rol Actualizado!',
                'el rol se actualizo correctamente!',
                'success'
            )
        </script>
        @endif
    </x-slot>

</x-colabors-layout>