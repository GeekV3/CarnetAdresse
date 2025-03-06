<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Contact::select('nom', 'prenom', 'email', 'telephone_1', 'entreprise')->get();
    }

    public function headings(): array
    {
        return ['Nom', 'Prénom', 'Email', 'Téléphone', 'Entreprise'];
    }
}
