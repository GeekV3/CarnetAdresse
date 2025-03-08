<?php

namespace App\Livewire; 

use Livewire\Component;
use App\Models\Contact; // Assure-toi d'importer le modèle Contact

class ContactList extends Component
{
    public $contacts;
    public $editingContact = null;
    public $contactId, $contactName, $nom, $prenom, $email, $telephone_1, $telephone_2, $entreprise, $description;


    protected $listeners = [
        'contactAdded' => 'refreshList',
        'deleteContact' => 'deleteContact',
        'contactUpdated' => 'refreshList',
        'confirmDelete' => 'deleteContact'
    ];

    public function mount()
    {
        $this->refreshList();
        $this->contacts = Contact::with('tags')->get();

        // Appliquer la logique pour vérifier la couleur
        foreach ($this->contacts as $contact) {
            foreach ($contact->tags as $tag) {
                // Vérifier si la couleur est valide et la formater correctement
                $tag->couleur = !empty($tag->couleur) && preg_match('/^#[a-f0-9]{6}$/i', $tag->couleur) ? $tag->couleur : '#ccc';
            }
        }
    }

    public function refreshList()
    {
        $this->contacts = Contact::all();
    }

    public function render()
    {
        $contacts = Contact::with('tags')->get(); // Charger les tags avec les contacts
        return view('livewire.contact-list', compact('contacts'));
    }

    

    public function showContactDetails($id)
    {
        $contact = Contact::findOrFail($id);
        
        $this->nom = $contact->nom;
        $this->prenom = $contact->prenom;
        $this->email = $contact->email;
        $this->telephone_1 = $contact->telephone_1;
        $this->telephone_2 = $contact->telephone_2;
        $this->entreprise = $contact->entreprise;
        $this->description = $contact->description;

        $this->dispatch('show-view-modal');
    }
    
    // Méthode pour afficher la modale de confirmation
    public function confirmDelete($id)
    {
        $contact = Contact::findOrFail($id);
        $this->contactId = $id;
        $this->contactName = $contact->nom;
        $this->dispatch('show-delete-confirmation');
    }

    // Méthode pour supprimer un contact
    public function deleteContact()
    {
        $contact = Contact::findOrFail($this->contactId);
        $contact->delete();
        $this->refreshList();
    }
}