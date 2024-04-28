<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="{{asset('img/home/logo-ong-circle.png')}}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            

            <!-- Page Content -->
            
            <div class="container py-8 grid grid-cols-5 gap-6">
                <aside>
                    <h1 class="font-bold text-lg mb-4">Edicion del caso</h1>
                    <ul class="text-sm text-gray-600 mb-4">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('cases.edit', $case) border-rose-400 @else border-transparent @endif pl-2">
                            <a href="{{route('cases.edit', $case)}}">Informacion del caso</a>
                        </li>
                        @if ($case->status >= 3)
                            <li class="leading-7 mb-1 border-l-4 @routeIs('cases.event', $case) border-rose-400 @else border-transparent @endif pl-2">
                                <a href="{{route('cases.event', $case)}}">Seguimiento del Caso</a>
                            </li>
                        @endif
                        <li class="leading-7 mb-1 border-l-4  border-rose-500 pl-2">
                            <a href="{{route('cases.index')}}">Volver al Listado</a>
                        </li>
                    </ul>

                    @switch($case->status)
                        @case(2)
                            <form action="{{route('cases.status', $case)}}" method="POST">
                                @csrf
        
                                <button class="btn btn-danger" type="submit">Atender Caso</button>
                            </form>
                            @break
                        @case(3)
                            <div class="card text-black">
                                <div class="card-body bg-yellow-400">
                                    Este caso esta en proceso
                                </div>
                            </div>
                            @if ($case->events()->count())
                            <form action="{{route('cases.close', $case)}}" method="POST" class="mt-4">
                                @csrf
        
                                <button class="btn btn-danger" type="submit">Cerrar Caso</button>
                            </form>
                            @endif
                            @break
                        @case(4)
                            <div class="card text-black">
                                <div class="card-body bg-green-100">
                                    Este caso se encuentra cerrado
                                </div>
                            </div>
                            @break
                        @default
                            
                    @endswitch

                </aside>
        
                <div class="col-span-4 card">
                    <main class="card-body text-gray-700">
                        {{$slot}}        
                    </main>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            {{$js}}
        @endisset

    </body>
</html>