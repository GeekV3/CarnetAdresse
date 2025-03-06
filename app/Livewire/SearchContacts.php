<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class SearchContacts extends Component
{
    public $search = '';

    public function render()
    {
        $contacts = Contact::where('nom', 'like', "%{$this->search}%")->get();

        return view('livewire.search-contacts', compact('contacts'));
    }
}

