<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactsImport;

class ImportContacts extends Component
{
    use WithFileUploads;

    public $isOpen = false; // Gère l'affichage du modal
    public $file;

    // Ouvrir le modal
    public function openModal()
    {
        $this->isOpen = true;
    }

    // Fermer le modal
    public function closeModal()
    {
        $this->reset(['isOpen', 'file']); // Réinitialise le formulaire
    }

    // Importer les contacts
    public function importContacts()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new ContactsImport, $this->file->path());

        session()->flash('message', 'Contacts importés avec succès !');

        $this->reset(['file', 'isOpen']); 
        $this->emit('refreshContacts');
    }

    public function render()
    {
        return view('livewire.import-contacts');
    }
}
