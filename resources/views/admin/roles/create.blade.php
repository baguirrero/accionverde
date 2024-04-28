<x-colabors-layout>
    <h1 class="text-2xl font-bold ">Crear Rol</h1>
    <hr class="mt-2 mb-6">

    {!! Form::open(['route'=>'roles.store']) !!}
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

        @error('permisions')
            <br>
            <small class="text-red-600">
                <strong>{{$message}}</strong>
            </small>
            <br>
        @enderror

        @foreach ($permisions as $permision)
            
            <div>
                <label>
                    {!! Form::checkbox('permisions[]', $permision->id, null, ['class'=>'mr-1']) !!}
                    {{$permision->name}}
                </label>
            </div>

        @endforeach

        {!! Form::submit('Crear rol', ['class'=>'btn btn-primary mt-2']) !!}

    {!! Form::close() !!}

</x-colabors-layout>