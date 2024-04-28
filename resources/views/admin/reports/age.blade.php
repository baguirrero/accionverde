<x-report-layout>
    <h1 class="text-2xl font-bold ">Reporte de Edades</h1>
    <hr class="mt-2 mb-6">
    
    {!! Form::open(['route'=>'reports.años']) !!}

        <div class="flex justify-end">
            {!! Form::submit('Obtener Reporte', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    <hr class="mt-2 mb-6">

    @livewire('admin.age-report')
</x-report-layout>