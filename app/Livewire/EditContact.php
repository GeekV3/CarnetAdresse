<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Validation\Rule;
class EditContact extends Component
{
    public $contactId, $nom, $prenom, $email, $telephone_1, $telephone_2, $entreprise, $description;
    
    protected $listeners = ['editContact' => 'loadContact'];

    protected function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('contacts', 'email')->ignore($this->contactId)],
            'telephone_1' => 'required|string|max:20',
            'telephone_2' => 'nullable|string|max:20',
            'entreprise' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ];
    }

    public function loadContact($id)
    {
        $contact = Contact::findOrFail($id);
        $this->contactId = $contact->id;
        $this->nom = $contact->nom;
        $this->prenom = $contact->prenom;
        $this->email = $contact->email;
        $this->telephone_1 = $contact->telephone_1;
        $this->telephone_2 = $contact->telephone_2;
        $this->entreprise = $contact->entreprise;
        $this->description = $contact->description;

        // Ouvrir la modale
        $this->dispatch('show-edit-modal');
    }

    public function update()
    {
        $this->validate();

        Contact::findOrFail($this->contactId)->update([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'telephone_1' => $this->telephone_1,
            'telephone_2' => $this->telephone_2,
            'entreprise' => $this->entreprise,
            'description' => $this->description,
        ]);

        // Fermer la modale et rafraîchir la liste
        $this->dispatch('close-edit-modal');
        $this->dispatch('contactUpdated');

        // Réinitialiser les champs
        $this->reset();
    }

    public function render()
    {
        return view('livewire.edit-contact');
    }
}
