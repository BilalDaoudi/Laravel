<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MyImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Vous pouvez traiter les données ici, par exemple, en utilisant print_r pour les afficher.
        print_r($rows);
    }
}
