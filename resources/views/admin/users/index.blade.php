<x-colabors-layout>
    <h1 class="text-2xl font-bold ">Lista de Usuarios</h1>
    <hr class="mt-2 mb-6">

    {!! Form::open(['route'=> 'users.store', 'autocomplete' => 'off']) !!}

    <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 xs:grid-cols-1 gap-4 mt-4">
        {!! Form::text('email', null, ['class'=>'form-input rounded-lg ', 'placeholder' => 'Ingrese correo de la persona']) !!}

        {!! Form::submit('Enviar Formulario de Registro', ['class' => 'btn btn-primary rounded-lg justify-end']) !!}
    </div>

    {!! Form::close() !!}

    @livewire('admin.admin-user')

    <x-slot name="js">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @if (session('send') == 'ok')
            <script>
                Swal.fire(
                    'Correo Enviado!',
                    'el correo se envio correctamente!',
                    'success'
                )
            </script>
            @endif
    </x-slot>

</x-colabors-layout>