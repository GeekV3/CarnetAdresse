<div>
    <div class="mb-4">
        <h2 class="text-center">Créer un nouveau Tag</h2>
        <form wire:submit.prevent="createTag" class="card p-4 shadow-sm bg-light">
            <div class="mb-3">
                <label for="nom" class="form-label fw-bold">Nom du tag</label>
                <input type="text" id="nom" wire:model="nom" class="form-control" placeholder="Entrez un nom">
                @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="couleur" class="form-label fw-bold">Couleur</label>
                <input type="color" id="couleur" wire:model="couleur" class="form-control form-control-color">
            </div>

            <button type="submit" class="btn btn-success w-100">Ajouter</button>
        </form>
    </div>

    <hr>

    <h2 class="mt-4 text-center">Liste des Tags</h2>
    <div class="table-responsive mt-3">
        <table class="table table-hover shadow-sm">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nom</th>
                    <th>Couleur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr class="text-center">
                        <td class="align-middle fw-bold">{{ $tag->nom }}</td>
                        <td class="align-middle">
                            <span class="badge" style="background-color: '{{ $tag->couleur }}; padding: 10px; border-radius: 5px;'">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </td>
                        <td class="align-middle">
                            <button wire:click="deleteTag({{ $tag->id }})" class="btn btn-danger btn-sm">
                                Supprimer
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
