<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactsImport;
use Illuminate\Support\Facades\Session;

class ImportContacts extends Component
{
    use WithFileUploads;

    public $file;

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new ContactsImport, $this->file);

        Session::flash('message', 'Contacts importés avec succès !');

        $this->dispatch('contactsImported'); // Rafraîchir la liste des contacts
        $this->file = null; // Réinitialiser le fichier après importation
    }

    public function render()
    {
        return view('livewire.import-contacts');
    }
}
