<div> 
    <div>
        @if($contacts->isNotEmpty())  
            <p>Nombre de contacts chargés : {{ $contacts->count() }}</p>  

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Entreprise</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->nom }}</td>
                            <td>{{ $contact->prenom }}</td>
                            <td>{{ $contact->entreprise }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->telephone_1 }}</td>
                            <td>
                                <button wire:click="showContactDetails({{ $contact->id }})" class="btn btn-info btn-sm">Voir</button>
                                <button wire:click="dispatch('editContact', [{{ $contact->id }}])" class="btn btn-warning">Modifier</button>
                                <button wire:click="confirmDelete({{ $contact->id }})" class="btn btn-danger btn-sm">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun contact trouvé.</p>
        @endif
    </div>
    <!-- Modal pour modifier un contact -->
    @livewire('edit-contact')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('show-edit-modal', () => {
            var myModal = new bootstrap.Modal(document.getElementById('editContactModal'));
            myModal.show();
        });

        Livewire.on('close-edit-modal', () => {
            var myModalEl = document.getElementById('editContactModal');
            var modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide();
        });
    });
    </script>



    <!-- Modal pour afficher les détails du contact -->
    <div class="modal fade" id="viewContactModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Détails du Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nom :</strong> {{ $nom }}</p>
                    <p><strong>Prénom :</strong> {{ $prenom }}</p>
                    <p><strong>Email :</strong> {{ $email }}</p>
                    <p><strong>Téléphone 1 :</strong> {{ $telephone_1 }}</p>
                    <p><strong>Téléphone 2 :</strong> {{ $telephone_2 }}</p>
                    <p><strong>Entreprise :</strong> {{ $entreprise }}</p>
                    <p><strong>Description :</strong> {{ $description }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteContactModal" tabindex="-1" aria-labelledby="deleteContactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteContactModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer le contact suivant : <strong>{{ $contactName }}</strong> ? Cette action est irréversible.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" wire:click="deleteContact" data-bs-dismiss="modal">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Écouter l'événement 'show-view-modal' et afficher la modale
            Livewire.on('show-view-modal', () => {
                var myModal = new bootstrap.Modal(document.getElementById('viewContactModal'));
                myModal.show();
            });

            // Écouter l'événement pour afficher la modale de suppression
            Livewire.on('show-delete-confirmation', (data) => {
                // Mettre à jour le nom du contact dans la modale
                var myModal = new bootstrap.Modal(document.getElementById('deleteContactModal'));
                myModal.show();
            });
        });
    </script>


</div>
