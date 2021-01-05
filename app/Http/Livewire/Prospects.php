<?php

namespace App\Http\Livewire;

use App\Models\Prospect;
use Livewire\Component;
use Livewire\WithPagination;

class Prospects extends Component
{
    use WithPagination;

    public string $search = '';
    public string $sortField = '';
    public bool $sortAsc = true;

    public function mount()
    {
        $this->queryString = ['search', 'sortAsc', 'sortField'];
    }

    public function render()
    {
        return view('livewire.prospects',
            [
                'prospects' => Prospect::where('name', 'like', '%' . $this->search . '%')
                    ->when($this->sortField, function ($query) {
                        $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                    })->paginate(10)
            ]
        );
    }

    public function delete(string $id)
    {
        Prospect::destroy($id);
    }
}
