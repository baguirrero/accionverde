<div>
    @foreach ($event->progress as $item)
        <article class="card mt-4" x-data="{open: false}">
            <div class="card-body">

                @if ($progres->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="progres.name" class="form-input w-full">
                        </div>

                        @error('progres.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button type="button" class="btn btn-danger" wire:click="cancel">Cancelar</button>
                            <button type="submit" class="btn btn-primary ml-2">Actualizar</button>
                        </div>
                    </form>
                @else
                    <header>
                        <h1 class="cursor-pointer font-bold" x-on:click="open = !open"><i class="far fa-play-circle text-blue-600 mr-2"></i>Task / Avance: <strong class="text-blue-500">{{$item->name}}</strong></h1>
                    </header>

                    <div x-show="open">
                        <hr class="my-2 bg-gray-600">
                        <p class="text-sm">Fecha: {{$item->date}}</p>

                        <div class="my-2">
                            <button class="btn btn-primary text-sm" wire:click="edit({{$item}})">Editar</button>
                            <button class="btn btn-danger text-sm" wire:click="destroy({{$item}})">Eliminar</button>
                        </div>

                        <div class="mb-4">
                            @livewire('lawyer.progres-description', ['progres' => $item], key('progres-description' . $item->id))
                        </div>

                        <div>
                            @livewire('lawyer.progres-resoruce', ['progress' => $item], key('progres-resoruce' . $item->id))
                        </div>
                    </div>
                @endif
            </div>
        </article>
    @endforeach


    <div class="mt-4" x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar Nuevo Avance/Tarea
        </a>

        <article class="card" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold mb-4">Agregar Nueva Avance/Tarea</h1>

                <div class="flex items-center">
                    <label class="w-32">Nombre:</label>
                    <input wire:model="name" class="form-input w-full">
                </div>

                @error('name')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror

                <div class="flex justify-end mt-2">
                    <button class="btn btn-secondary" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
