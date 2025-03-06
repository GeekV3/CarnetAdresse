<?php

namespace App\Livewire;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactsExport;

class ExportContacts extends Component
{
    public function export()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }

    public function render()
    {
        return view('livewire.export-contacts');
    }
}
