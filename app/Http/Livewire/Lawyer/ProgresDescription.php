<?php

namespace App\Http\Livewire\Lawyer;

use App\Models\Progress;
use Livewire\Component;

class ProgresDescription extends Component
{
    public $progress, $description, $name;

    protected $rules = [
        'description.name' => 'required'
    ];

    public function mount(Progress $progres){
        $this->progress = $progres;

        if ($progres->description) {
            $this->description = $progres->description;
        }
    }

    public function render()
    {
        return view('livewire.lawyer.progres-description');
    }

    public function store(){
        $this->description = $this->progress->description()->create(['name' => $this->name]);

        $this->reset('name');
        $this->progress = Progress::find($this->progress->id);
    }

    public function update(){
        $this->validate();
        $this->description->save();
    }

    public function destroy(){
        $this->description->delete();
        $this->reset('description');

        $this->progress = Progress::find($this->progress->id);
    }
}
