<?php

namespace App\Http\Livewire\Lawyer;

use App\Models\Event;
use App\Models\Person;
use Carbon\Carbon;
use Livewire\Component;

class CaseEvent extends Component
{
    public $case, $event, $name, $fechaactual;

    protected$rules = [
        'event.name' => 'required'
    ];

    public function mount(Person $case){
        $this->case = $case;
        $this->event = new Event();
        $this->fechaactual = Carbon::now('America/Lima')->format('Y-m-d');;
    }

    public function render()
    {
        return view('livewire.lawyer.case-event')->layout('layouts.lawyer', ['case' => $this->case]);
    }

    public function store(){

        $this->validate([
            'name' => 'required'
        ]);

        Event::create([
            'name' => $this->name,
            'date' => $this->fechaactual,
            'person_id' => $this->case->id
        ]);

        $this->reset('name');
        $this->case = Person::find($this->case->id);
    }

    public function edit(Event $event){
        $this->event = $event;
    }

    public function update(){

        $this->validate();

        $this->event->save();
        $this->event = new Event();

        $this->case = Person::find($this->case->id);
    }

}
