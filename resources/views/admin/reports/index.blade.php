<x-report-layout>
    <h1 class="text-2xl font-bold ">Reportes Con Filtros</h1>
    <hr class="mt-2 mb-6">

    <div class="container">
        <h1 class="text-xl font-bold ">Casos Ingresados Por Mes</h1>
        <hr class="mt-2 mb-6">

        {!! Form::open(['route' => 'reports.mes']) !!}
            <div class="grid lg:grid-cols-2 gap-4 mt-4">
                <div>
                    {!! Form::select('id_mes', ['Seleccion uno', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL',
                'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SETIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'], null, 
                ['class'=>'form-control rounded-lg w-full']) !!}
                </div>
                <div>
                    {!! Form::submit('Generar Reporte(Excel)', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        {!! Form::close() !!}

    </div>
    <hr class="mt-2 mb-6">
    <div class="container">
        <h1 class="text-xl font-bold ">Casos Ingresados Por Semana</h1>
        <hr class="mt-2 mb-6">

        {!! Form::open(['route' => 'reports.semana']) !!}
            <div class="grid lg:grid-cols-4 gap-4 mt-4">
                <div>
                    {!! Form::date('fech_1', null, ['class' => 'form-control rounded-lg']) !!}
                </div>
                <div class="justify-center mt-3">
                    {!! Form::label('id_lable', 'Seleccionar las dos fecha') !!}
                </div>
                <div>
                    {!! Form::date('fech_2', null, ['class' => 'form-control rounded-lg']) !!}
                </div>
                <div>
                    {!! Form::submit('Generar Reporte(Excel)', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        {!! Form::close() !!}

    </div>

    <hr class="mt-2 mb-6">
    <div class="container">
        <h1 class="text-xl font-bold ">Casos Ingresados Por Empleabilidad</h1>
        <hr class="mt-2 mb-6">

        {!! Form::open(['route' => 'reports.empleab']) !!}
            <div class="grid lg:grid-cols-2 gap-4 mt-4">
                <div>
                    {!! Form::select('id_emp', $empleo, null, 
                ['class'=>'form-control rounded-lg w-full']) !!}
                </div>
                <div>
                    {!! Form::submit('Generar Reporte(Excel)', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        {!! Form::close() !!}

    </div>

    <hr class="mt-2 mb-6">
    <div class="container">
        <h1 class="text-xl font-bold ">Casos Ingresados Por Lugares de Residencia</h1>
        <hr class="mt-2 mb-6">

        {!! Form::open(['route' => 'reports.residencia']) !!}
            <div class="grid lg:grid-cols-2 gap-4 mt-4">
                <div>
                    {!! Form::select('id_home', $home, null, 
                ['class'=>'form-control rounded-lg w-full']) !!}
                </div>
                <div>
                    {!! Form::submit('Generar Reporte(Excel)', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        {!! Form::close() !!}

    </div>

    <hr class="mt-2 mb-6">
    <div class="container">
        <h1 class="text-xl font-bold ">Casos Ingresados Por Nivel Educativo</h1>
        <hr class="mt-2 mb-6">

        {!! Form::open(['route' => 'reports.niveled']) !!}
            <div class="grid lg:grid-cols-2 gap-4 mt-4">
                <div>
                    {!! Form::select('id_insttruct', $instruc, null, 
                ['class'=>'form-control rounded-lg w-full']) !!}
                </div>
                <div>
                    {!! Form::submit('Generar Reporte(Excel)', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        {!! Form::close() !!}

    </div>
</x-report-layout>