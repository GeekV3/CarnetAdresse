<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Validation\Rule;
class EditContact extends Component
{
    public $contactId, $nom, $prenom, $email, $telephone_1, $telephone_2, $entreprise, $description;
    
    protected $listeners = ['editContact' => 'loadContact'];

    public $tags = [];
    public $newTag = '';
    public $colors = ['#FF5733', '#33FF57', '#3357FF', '#FF33A8']; // Quelques couleurs aléatoires

    public function addTag()
    {
        if (!empty($this->newTag)) {
            $this->tags[] = [
                'name' => $this->newTag,
                'color' => $this->colors[array_rand($this->colors)]
            ];
            $this->newTag = ''; // Réinitialiser l'input
        }
    }

    public function removeTag($index)
    {
        unset($this->tags[$index]);
        $this->tags = array_values($this->tags); // Réindexer le tableau
    }


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
        $this->tags = $contact->tags->map(function ($tag) {
            return [
                'id' => $tag->id,
                'name' => $tag->nom,
                'color' => $tag->couleur
            ];
        })->toArray();
        

        // Ouvrir la modale
        $this->dispatch('show-edit-modal');
    }
    public function attachTag($tagId)
    {
        $contact = Contact::find($this->contactId);
        if (!$contact->tags->contains($tagId)) {
            $contact->tags()->attach($tagId);
        }
        $this->loadContact($this->contactId);
    }

    public function detachTag($tagId)
    {
        $contact = Contact::find($this->contactId);
        $contact->tags()->detach($tagId);
        $this->loadContact($this->contactId);
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
