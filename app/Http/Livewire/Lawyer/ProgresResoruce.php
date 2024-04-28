<?php

namespace App\Http\Livewire\Lawyer;

use App\Models\Progress;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProgresResoruce extends Component
{
    use WithFileUploads;

    public $progress, $file;

    public function mount(Progress $progress){
        $this->progress = $progress;
    }

    public function render()
    {
        return view('livewire.lawyer.progres-resoruce');
    }

    public function save(){
        $this->validate([
            'file' => 'required'
        ]);

        $url = $this->file->store('resources');

        $this->progress->resource()->create([
            'url' => $url
        ]);

        $this->progress = Progress::find($this->progress->id);

    }

    public function download(){
        return response()->download(storage_path('app/' . $this->progress->resource->url));
    }

    public function destroy(){
        Storage::delete($this->progress->resource->url);
        $this->progress->resource->delete();
        $this->progress = Progress::find($this->progress->id);
    }
}
