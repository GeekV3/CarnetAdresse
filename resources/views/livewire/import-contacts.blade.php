<!-- Bouton pour ouvrir la modale -->
<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">
    Importer Contacts
</button>

<!-- Fenêtre modale pour l'importation -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Importer des Contacts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @livewire('import-contacts')
            </div>
        </div>
    </div>
</div>
