<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Search extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.search');
    }

    public function getResultsProperty(){

        $response = Http::get('https://dniruc.apisperu.com/api/v1/dni/'.$this->search , [
            'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImJvZ3VpcnJlQGdtYWlsLmNvbSJ9.oAtXJNjZbJr6In7Lou-8mN4996MRachznGrhc6qCQwc'
        ]);
        return  $response->json();

       

        // return Course::where('title', 'LIKE', '%' . $this->search . '%')->where('status', 3)->take(8)->get();
    }
}
