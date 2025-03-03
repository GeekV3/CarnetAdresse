<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;

class ContactsImport implements ToModel
{
    // La méthode `model` permet de créer chaque contact depuis le fichier
    public function model(array $row)
    {
        return new Contact([
            'nom' => $row[0], // Assurez-vous que l'ordre des colonnes correspond à votre fichier CSV/Excel
            'prenom' => $row[1],
            'email' => $row[2],
            'telephone_1' => $row[3],
            'telephone_2' => $row[4] ?? null, // Si aucune valeur pour téléphone 2, le définir à null
            'entreprise' => $row[5],
            'description' => $row[6] ?? null,
        ]);
    }
}
