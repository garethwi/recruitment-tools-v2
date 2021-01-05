<?php

namespace App\Http\Livewire;

use App\ExternalServices\PeopleDataLabsSearcher;
use App\Models\PeopleDataLabs;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PeopleDataLabsSummary extends Component
{
    public string $linkedInUrl = '';
    public string $status = 'new';
    public PeopleDataLabs $peopleDataLabs;

    protected $listeners = ['searchAll' => 'searchAll'];

    public function mount(string $url = '')
    {
        $this->linkedInUrl = $url;
        $peopleDataLabs = null;
        if ($url) {
            $peopleDataLabs = PeopleDataLabs::whereLinkedinUrl($url)->first();
        }
        $this->peopleDataLabs = $peopleDataLabs ?: new PeopleDataLabs();
        $this->status = $peopleDataLabs ? $peopleDataLabs->status : $this->status;
    }

    public function render()
    {
        return view('livewire.people-data-labs-summary');
    }

    public function search()
    {
        $this->peopleDataLabs = PeopleDataLabsSearcher::search($this->linkedInUrl);
        $this->status = $this->peopleDataLabs->status;
    }

    public function searchAll()
    {
        Log::debug('An informational message.');
        if ($this->status == 'new') {
            $this->search();
        }
    }

}
