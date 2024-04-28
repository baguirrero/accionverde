<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TimeConsultReport extends Component
{
    public function render()
    {
        $cases= DB::select('call obtenerTiempoAtencionConsulta');

        return view('livewire.admin.time-consult-report', compact('cases'));
    }
}
