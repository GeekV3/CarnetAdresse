<div>
    <!-- Bouton pour ouvrir la modale -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addContactModal">
        Ajouter Contact
    </button>

    <!-- Modale Bootstrap -->
    <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addContactModalLabel">Ajouter un nouveau contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-2">
                            <label>Nom</label>
                            <input type="text" class="form-control" wire:model="nom">
                            @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Prénom</label>
                            <input type="text" class="form-control" wire:model="prenom">
                            @error('prenom') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Email</label>
                            <input type="email" class="form-control" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Téléphone 1</label>
                            <input type="text" class="form-control" wire:model="telephone_1">
                            @error('telephone_1') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Téléphone 2</label>
                            <input type="text" class="form-control" wire:model="telephone_2">
                            @error('telephone_2') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Entreprise</label>
                            <input type="text" class="form-control" wire:model="entreprise">
                        </div>

                        <div class="mb-2">
                            <label>Description</label>
                            <textarea class="form-control" wire:model="description"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('close-modal', () => {
            var myModalEl = document.getElementById('addContactModal');
            var modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide();
        });
    });
</script>
