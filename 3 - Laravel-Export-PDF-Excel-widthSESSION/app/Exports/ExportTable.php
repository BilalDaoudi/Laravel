<?php

namespace App\Exports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportTable implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        $clients = Client::select('username', 'nom', 'localisation', 'commentaire')->get();
        Session::put('data', $clients->toArray());
        if (Session::has('data'))
            return collect([Session::get('data')]);
        else
            return collect(["non data"]);
    }

   
    public function headings(): array
    {
        Session::put('header', [
            'Username',
            'Nom',
            'Localisation',
            'Commentaire',
        ]);
        return Session::get('header');
    }
}
