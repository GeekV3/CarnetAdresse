<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class SearchContacts extends Component
{
    public $search = ''; // ✅ Initialise la variable pour éviter l'erreur

    public function render()
    {
        // Vérifie si une recherche est faite
        $contacts = Contact::where('nom', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.search-contacts', compact('contacts'));
    }
}
