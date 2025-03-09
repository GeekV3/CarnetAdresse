<div>
    <input type="text" wire:model="search" placeholder="Rechercher un contact..." class="form-control mb-3">

    @if(isset($contacts) && $contacts->count() > 0)
        <ul class="list-group">
            @foreach($contacts as $contact)
                <li class="list-group-item">
                    <strong>{{ $contact->nom }}</strong> - {{ $contact->email }}
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucun contact trouvé.</p>
    @endif
</div>
