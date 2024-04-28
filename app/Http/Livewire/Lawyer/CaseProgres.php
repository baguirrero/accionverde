<?php

namespace App\Http\Livewire\Lawyer;

use App\Models\Event;
use App\Models\Progress;
use Carbon\Carbon;
use Livewire\Component;

class CaseProgres extends Component
{
    public $event, $progres, $fechaactual, $name;

    protected $rules = [
        'progres.name' => 'required'
    ];

    public function mount(Event $event){
        $this->event = $event;
        $this->fechaactual = Carbon::now('America/Lima')->format('Y-m-d');
        $this->progres = new Progress();
    }

    public function render()
    {
        return view('livewire.lawyer.case-progres');
    }

    public function store(){
        $rules = [
            'name' => 'required'
        ];

        $this->validate($rules);
        Progress::create([
            'name' => $this->name,
            'date' => $this->fechaactual,
            'event_id' => $this->event->id
        ]);

        $this->reset(['name']);
        $this->event = Event::find($this->event->id);
    }


    public function edit(Progress $progres){
        $this->resetValidation();
        $this->progres = $progres;
    }

    public function update(){
        $this->validate();

        $this->progres->save();
        $this->progres = new Progress();
        $this->event = Event::find($this->event->id);
    }

    public function destroy(Progress $progres){
        $progres->delete();
        $this->event = Event::find($this->event->id);
    }

    public function cancel(){
        $this->progres = new Progress();
    }
}
