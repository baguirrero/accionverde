<?php

namespace App\Http\Livewire\Admin;

use App\Models\Event;
use App\Models\Person;
use Carbon\Carbon;
use Livewire\Component;

class AdminEvent extends Component
{

    public $case, $event, $name, $fechaactual;

    protected $rules = [
        'event.name' => 'required'
    ];

    public function mount(Person $case){
        $this->case = $case;
        $this->event = new Event();
        $this->fechaactual = Carbon::now('America/Lima')->format('Y-m-d');;
    }

    public function render()
    {
        return view('livewire.admin.admin-event')->layout('layouts.person', ['person' => $this->case]);
    }
}
