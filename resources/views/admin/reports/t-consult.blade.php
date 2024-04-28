<x-report-layout>
    <h1 class="text-2xl font-bold ">Reporte de Tiempo de Consulta</h1>
    <hr class="mt-2 mb-6">

    {!! Form::open(['route'=>'reports.tiempo']) !!}

        <div class="flex justify-end">
            {!! Form::submit('Obtener Reporte', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    <hr class="mt-2 mb-6">

    @livewire('admin.time-consult-report');

</x-report-layout>