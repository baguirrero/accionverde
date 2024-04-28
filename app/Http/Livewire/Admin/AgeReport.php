<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AgeReport extends Component
{
    use WithPagination;

    public function render()
    {
        $cases= DB::select('call obtenerEdadesCasos');

        return view('livewire.admin.age-report', compact('cases'));
    }
}
