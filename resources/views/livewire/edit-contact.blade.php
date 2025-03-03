<div>
@aware(['showForm'])

    <div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="editContactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form wire:submit.prevent="update">
                        <input type="hidden" wire:model="contactId">

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
        Livewire.on('show-edit-modal', () => {
            let modal = new bootstrap.Modal(document.getElementById('editContactModal'));
            modal.show();
        });

        Livewire.on('close-edit-modal', () => {
            let modalEl = document.getElementById('editContactModal');
            let modalInstance = bootstrap.Modal.getInstance(modalEl);
            if (modalInstance) modalInstance.hide();
        });
    });

</script>
