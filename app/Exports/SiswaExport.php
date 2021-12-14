<?php

namespace App\Exports;

use App\Models\Siswa as ModelsSiswa;
use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModelsSiswa::all();
    }
}