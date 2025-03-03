<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class CreateContact extends Component
{
    public $nom, $prenom, $entreprise, $email, $telephone_1, $telephone_2, $description;
    public $showForm = false;

    protected $rules = [
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:contacts,email',
        'telephone_1' => 'required|string|max:20',
        'telephone_2' => 'nullable|string|max:20',
        'entreprise' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ];

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function save()
    {
        $this->validate();

        Contact::create([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'entreprise' => $this->entreprise,
            'email' => $this->email,
            'telephone_1' => $this->telephone_1,
            'telephone_2' => $this->telephone_2,
            'description' => $this->description,
        ]);

        // Réinitialiser le formulaire
        $this->reset();

        // Rafraîchir la liste des contacts
        $this->dispatch('contactAdded');

        // Fermer le formulaire
        $this->showForm = false;

        return redirect()->to('/home');
    }

    public function render()
    {
        return view('livewire.create-contact');
    }
}
