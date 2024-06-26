<div>

    <h1 class="text-2xl font-bold">EVENTOS DE EVALUACION</h1>
    <hr class="mt-2 mb-6">

    @foreach ($case->events as $item)
        <article class="card mb-6" x-data="{open: true}">
            <div class="card-body bg-gray-100">

                @if ($event->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="event.name" class="form-input w-full" placeholder="Ingrese el nombre del evento">

                        @error('event.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </form>
                
                @else
                    <header class="flex justify-between items-center">
                        <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Evento: </strong>{{$item->name}}<strong>  Fecha: </strong>{{$item->date}}</h1>

                        <div>
                            <i class="fas fa-edit cursor-pointer text-blue-700" wire:click="edit({{$item}})"></i>
                            {{-- <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$item}})"></i> --}}
                        </div>
                    </header>

                    <div x-show="open">
                        @livewire('lawyer.case-progres', ['event' => $item], key($item->id))
                    </div>

                @endif

            </div>
        </article>
    @endforeach

    @if ($case->status == 4)
        
    @else
        <div x-data="{open: false}">
            <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
                <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
                Agregar Nuevo Evento de Evaluacion
            </a>

            <article class="card" x-show="open">
                <div class="card-body bg-gray-100">
                    <h1 class="text-xl font-bold mb-4">Agregar Nuevo Evento</h1>

                    <div>
                        <input wire:model="name" class="form-input w-full" placeholder="Escriba el nombre de la seccion">
                        @error('name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-2">
                        <button class="btn btn-secondary" x-on:click="open = false">Cancelar</button>
                        <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                    </div>
                </div>
            </article>
        </div>
    @endif
    

</div>
