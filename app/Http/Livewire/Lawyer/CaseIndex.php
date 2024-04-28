<?php

namespace App\Http\Livewire\Lawyer;

use App\Models\Person;
use Livewire\Component;
use Livewire\WithPagination;

class CaseIndex extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        $cases = Person::where('ape_pater', 'LIKE', '%' . $this->search . '%')
                    ->where('user_id', auth()->user()->id)
                    ->latest('id')
                    ->paginate(8);

        return view('livewire.lawyer.case-index', compact('cases'));
    }

    public function limpiar_page(){
        $this->resetPage('page');
    }
}
