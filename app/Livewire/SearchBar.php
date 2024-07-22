<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\paciente;

class SearchBar extends Component
{
    public $search = '';
    public $results = [];

    public function updatedSearch()
    {
        $this->results = Paciente::where('nombre', 'like', '%' . $this->search . '%')->get();
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
