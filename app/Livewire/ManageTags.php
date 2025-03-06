<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tag;

class ManageTags extends Component
{
    public $tags, $nom, $couleur, $tagId;

    public function mount()
    {
        $this->loadTags();
    }

    public function loadTags()
    {
        $this->tags = Tag::all();
    }

    public function createTag()
    {
        $this->validate([
            'nom' => 'required|string|max:255',
            'couleur' => 'required|string|max:7', // Code couleur HEX
        ]);

        Tag::create([
            'nom' => $this->nom,
            'couleur' => $this->couleur,
        ]);

        $this->reset(['nom', 'couleur']);
        $this->loadTags();
    }

    public function deleteTag($id)
    {
        Tag::find($id)->delete();
        $this->loadTags();
    }

    public function render()
    {
        return view('livewire.manage-tags');
    }
}
