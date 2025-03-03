<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactsImport; // Import de la classe ContactsImport

class ImportContacts extends Component
{
    use WithFileUploads;

    public $file;

    // Règles de validation pour le fichier
    protected $rules = [
        'file' => 'required|mimes:csv,xlsx,xls|max:10240', // Limite à 10 Mo
    ];

    // Fonction pour gérer l'importation
    public function importContacts()
    {
        $this->validate(); // Validation du fichier

        try {
            // Utilisation du package Excel pour importer les contacts
            Excel::import(new ContactsImport, $this->file);
            
            // Message de succès
            session()->flash('message', 'Contacts importés avec succès!');
        } catch (\Exception $e) {
            // Gestion des erreurs
            session()->flash('error', 'Erreur lors de l\'importation: ' . $e->getMessage());
        }

        // Réinitialiser le fichier après l'importation
        $this->file = null;
    }

    public function render()
    {
        return view('livewire.import-contacts'); // Vue pour l'importation
    }
}
