<div>
    <!-- Bouton pour ouvrir le formulaire d'importation -->
    <button wire:click="openModal" class="btn btn-primary btn-sm">Importer des contacts</button>

    <!-- Affichage du modal si $isOpen est true -->
    @if($isOpen)
        <div class="modal fade show d-block" style="background: rgba(0, 0, 0, 0.5);" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Importer des contacts</h5>
                        <button type="button" class="close" wire:click="closeModal">&times;</button>
                    </div>

                    <div class="modal-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <input type="file" wire:model="file" class="form-control">
                        @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="modal-footer">
                        <button wire:click="importContacts" class="btn btn-success">Importer</button>
                        <button wire:click="closeModal" class="btn btn-secondary">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
