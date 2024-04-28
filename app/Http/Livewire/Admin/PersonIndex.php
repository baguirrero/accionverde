<?php

namespace App\Http\Livewire\Admin;

use App\Models\Person;
use Livewire\Component;
use Livewire\WithPagination;

class PersonIndex extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        $persons = Person::where('names', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('ape_pater', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('dni', 'LIKE', '%' . $this->search . '%')
                    ->latest('id')
                    ->paginate(8);

        return view('livewire.admin.person-index', compact('persons'));
    }

    public function limpiar_page(){
        $this->resetPage('page');
    }
}
