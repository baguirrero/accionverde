<x-app-layout>
    <div class="container py-6">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold ">FORMULARIO ACCION POR IGUALDAD</h1>

                <hr class="mt-2 mb-6">

                <div class="pt-2 relative mx-auto text-gray-600">
                    <input  class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm hover:border-rose-500"
                    id="documento" placeholder="Buscar DNI" autocomplete="off" type="number" min="1" max="999999999999" onkeypress="return solonumeros(event)">
                
                    <button type="button" id="buscar" class="bg-rose-500 hover:bg-rose-600 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                        Buscar
                    </button>
                </div>

                {{-- <form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
                    <input  class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                    name="search" placeholder="Buscar">
                
                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                        Buscar
                    </button>
                </form> --}}

                {!! Form::open(['route' => 'register.store', 'files' => true, 'autocomplete' => 'off', 'class'=>'formulario-add']) !!}

                {!! Form::hidden('date_create', $fechaactual) !!}
                <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 gap-4 mt-4">
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

                <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 gap-4 mt-4">

                    <div>
                        {!! Form::label('identity_id', '¿Como te Identificas?') !!}
                        {!! Form::select("identity_id", $identities, null, ['class' => 'form-input rounded-lg block w-full mt-1', 'id' => 'identidad']) !!}
                    </div>

                    <div>
                        {!! Form::label('social_name', 'Nombre Social') !!}
                        {!! Form::text('social_name', null, ['class' => 'form-input rounded-lg block w-full mt-1', 'onkeypress'=> 'return soloLetrasTildesNombreCampo(event)', 'id' => 'socialname']) !!}
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

                <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 gap-4 mt-4">
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

                <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 gap-4 mt-4">
                    <div>
                        {!! Form::label('email', 'Correo Electronico') !!}
                        {!! Form::text('email', null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}
                        @error('email')
                            <strong class="text-sm text-red-600">{{$message}}</strong>
                        @enderror
                    </div>
                    <div>
                        {!! Form::label('phone', 'Telefono') !!}
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

                <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 gap-4 mt-4">
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

                <hr class="mt-2 mb-6">

                <div>
                    <a  class="flex items-center cursor-pointer">
                        <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
                        <strong>Si el caso es una menor de edad: </strong>&nbsp;Si usted es representante legal de la menor de edad, por favor indicar sus datos a continuación&nbsp;<strong>Si no fuera asi omita esto</strong>
                    </a>
        
                    <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 gap-4 mt-4">
                        <a href="" x-on:click="open = false">Datos del Representante</a>
                        <div>
                            {!! Form::label('name_represent', 'Nombre del Representante') !!}
                            {!! Form::text('name_represent', null, ['class' => 'form-input rounded-lg block w-full mt-1']) !!}
                            @error('name_represent')
                                <strong class="text-sm text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                        <div>
                            {!! Form::label('dni_represent', 'DNI del Representante') !!}
                            {!! Form::text('dni_represent', null, ['class' => 'form-input rounded-lg block w-full mt-1', 'onkeypress'=> 'return solonumeros(event)']) !!}
                            @error('dni_represent')
                                <strong class="text-sm text-red-600">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    {!! Form::submit('Guardar Informacion', ['class' => 'btn btn-primary cursor-pointer rounded-lg']) !!}
                </div>

                {!! Form::close() !!}
                
            </div>
        </div>
    </div>

    <x-slot name="js">

        

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            function showContent() {
                var div2 = document.getElementById("xxx");
                var numtext = document.getElementById("numh");
                var select = document.getElementById("selecthijos");
                if (select.value == "NO") {
                    div2.style.display='none';
                    numtext.style.display='none';
                }
                else {
                    div2.style.display='block';
                    

                }
            }
        </script>

        @if (session('add') == 'ok')
        <script>
            Swal.fire(
                'Buen Trabajo!',
                'Se registro la informacion!',
                'success'
            )
        </script>
        @endif
        
        <script src="{{asset('js/api/api.js')}}"></script>
        
    </x-slot>

</x-app-layout>