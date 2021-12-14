<?php

namespace App\Exports;

use App\Biaya;
use App\Models\Biaya as ModelsBiaya;
use Maatwebsite\Excel\Concerns\FromCollection;

class BiayaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModelsBiaya::all();
    }
}
