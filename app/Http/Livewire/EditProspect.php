<?php

namespace App\Http\Livewire;

use App\Models\Prospect;
use Auth;
use Livewire\Component;
use Livewire\Redirector;

class EditProspect extends Component
{
    public Prospect $prospect;

    protected $rules = [
        'prospect.name' => 'required|string|min:6',
        'prospect.linkedin_urls' => 'required|string|min:6',
    ];
    public function mount(string $list = null)
    {
        if ($list) {
            $this->prospect = Prospect::find($list);
        } else {
            $this->prospect = new Prospect();
        }
    }
    public function render()
    {
        return view('livewire.edit-prospect');
    }

    public function save(): Redirector
    {
        $this->prospect->user_id = Auth::id();
        $this->prospect->save();
        session()->flash('message', 'Prospect List saved.');
        return redirect()->to(route('prospect-lists'));
    }

    public function stop(): Redirector
    {
        return redirect()->to(route('prospect-lists'));
    }
}
