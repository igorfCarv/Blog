<?php

namespace App\Livewire\Search;

use Livewire\Component;

class SearchBox extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        $this->dispatch('search',search: $this->search);
    }
    public function update()
    {
        $this->dispatch('search',search: $this->search);
    }
    public function render()
    {
        return view('livewire.search.search-box');
    }
}
