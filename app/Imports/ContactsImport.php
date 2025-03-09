<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Contact([
            'nom'          => $row['nom'] ?? null,
            'prenom'       => $row['prenom'] ?? null,
            'entreprise'   => $row['entreprise'] ?? null,
            'email'        => $row['email'] ?? null,
            'telephone_1'  => $row['telephone_1'] ?? null,
            'telephone_2'  => $row['telephone_2'] ?? null,
            'description'  => $row['description'] ?? null,
        ]);
    }
}
