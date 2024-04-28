<x-person-layout :person="$person">

    <h1 class="text-2xl font-bold ">ASIGNAR CASO</h1>
    <hr class="mt-2 mb-6">

    {!! Form::model($person, ['route' => ['persons.assing', $person], 'method' => 'put', 'files' => true]) !!}

    <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 xs:grid-cols-1 gap-4 mt-4 hidden">
        <div>
            {!! Form::label('dni', 'DNI') !!}
            {!! Form::text('dni', null, ['class' => 'form-input rounded-lg  block w-full mt-1' . ($errors->has('dni') ? ' border-red-600' : ''), 'autocomplete'=>'off', 'id'=>'dni', 'readonly']) !!}
            @error('dni')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror
        </div>
        <div>
            {!! Form::label('names', 'Nombres') !!}
            {!! Form::text('names', null, ['class' => 'form-input rounded-lg block w-full mt-1' . ($errors->has('names') ? ' border-red-600' : ''), 'autocomplete'=>'off', 'id'=>'nombres', 'readonly']) !!}
            @error('names')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror
        </div>
        <div>
            {!! Form::label('ape_pater', 'Apellido Paterno') !!}
            {!! Form::text('ape_pater', null, ['class' => 'form-input rounded-lg block w-full mt-1' . ($errors->has('ape_pater') ? ' border-red-600' : ''), 'autocomplete'=>'off', 'id'=>'apellidopat', 'readonly']) !!}
            @error('ape_pater')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror
        </div>
        <div>
            {!! Form::label('ape_mater', 'Apellido Materno') !!}
            {!! Form::text('ape_mater', null, ['class' => 'form-input rounded-lg block w-full mt-1' . ($errors->has('ape_mater') ? ' border-red-600' : ''), 'autocomplete'=>'off', 'id'=>'apellidomat', 'readonly']) !!}
            @error('ape_mater')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror
        </div>
    </div>

    <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 xs:grid-cols-1 gap-4 mt-4 hidden">

        <div>
            {!! Form::label('identity_id', '¿Como te Identificas?') !!}
            {!! Form::select("identity_id", $identities, null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}
        </div>

        <div>
            {!! Form::label('social_name', 'Nombre Social') !!}
            {!! Form::text('social_name', null, ['class' => 'form-input rounded-lg block w-full mt-1', 'onkeypress'=> 'return soloLetrasTildesNombreCampo(event)']) !!}
            @error('social_name')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror
        </div>
        <div>
            {!! Form::label('fecha_naci', 'Fecha de Nacimiento') !!}
            {!! Form::date('fecha_naci', null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}
            @error('fecha_naci')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror
        </div>
        <div>
            {!! Form::label('maritalstatus_id', 'Estado Civil') !!}
            {!! Form::select("maritalstatus_id", $maritalstatus, null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}
        </div>

    </div>

    <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 gap-4 mt-4 hidden">
        <div>
            {!! Form::label('birthplace_id', 'Lugar de Nacimiento') !!}
            {!! Form::select('birthplace_id', $birthplaces, null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}
        </div>
        <div>
            {!! Form::label('homeplace_id', 'Lugar de Residencia') !!}
            {!! Form::select('homeplace_id', $homeplaces, null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}
        </div>
        <div>
            {!! Form::label('nacionalidad', 'Nacionalidad') !!}
            {!! Form::text('nacionalidad', null, ['class' => 'form-input rounded-lg block w-full mt-1', 'onkeypress'=> 'return soloLetrasTildesNombreCampo(event)']) !!}
            @error('nacionalidad')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror
        </div>
    </div>

    <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 gap-4 mt-4 hidden">
        <div>
            {!! Form::label('email', 'Correo Electronico') !!}
            {!! Form::text('email', null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}
            @error('email')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror
        </div>
        <div>
            {!! Form::label('phone', 'Telefono(Opcional)') !!}
            {!! Form::text('phone', null, ['class' => 'form-input rounded-lg block w-full mt-1', 'onkeypress'=> 'return solonumeros(event)']) !!}
            @error('phone')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror
        </div>
        <div>
            {!! Form::label('profession_id', 'Profesion u Ocupacion') !!}
            {!! Form::select('profession_id', $profesions, null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}
        </div>
    </div>

    <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 xs:grid-cols-1 gap-4 mt-4 hidden">
        <div>
            {!! Form::label('instruction_id', 'Grado de Instruccion') !!}
            {!! Form::select('instruction_id', $instructions, null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}
        </div>
        <div>
            {!! Form::label('employment_id', 'Situacion Laboral') !!}
            {!! Form::select('employment_id', $employments, null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}
        </div>
        <div id="div1">
            {!! Form::label('son_id', '¿Tienes hijos?') !!}
            {!! Form::select('son_id', $sons, null, ['class' => 'form-input rounded-lg block w-full mt-1', 'id' => 'selecthijos', 'onchange'=>'javascript:showContent()']) !!}
        </div>

        <div id="xxx" style="display: none">
            {!! Form::label('num_hijos', 'Numero de Hijos') !!}
            {!! Form::text('num_hijos', null, ['class' => 'form-input rounded-lg block w-full mt-1', 'onchange'=>'javascript:showContent()', 'id'=>'numh', 'onkeypress'=> 'return solonumeros(event)']) !!}
        </div>
    </div>

    <div class="w-full">
        {!! Form::label('user_id', 'Abogados Registrados') !!}
        {!! Form::select('user_id', $users, null, ['class' => 'form-input rounded-lg block w-full mt-3']) !!}
    </div>

    <div class="flex justify-end mt-4">
        {!! Form::submit('Asignar Caso', ['class' => 'btn btn-primary cursor-pointer rounded-lg']) !!}
    </div>

    {!! Form::close() !!}

    <x-slot name="js">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
    </x-slot>

</x-person-layout>