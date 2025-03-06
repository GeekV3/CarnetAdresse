<div>
    <input type="text" wire:model="search" placeholder="Rechercher un contact..." class="form-input">
    
    @if($search != '')
        <ul>
            @foreach($contacts as $contact)
                <li>{{ $contact->nom }} - {{ $contact->email }}</li>
            @endforeach
        </ul>
    @endif
</div>
