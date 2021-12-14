<?php

namespace App\Exports;

use App\Dau;
use App\Models\Dau as ModelsDau;
use Maatwebsite\Excel\Concerns\FromCollection;

class DauExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModelsDau::all();
    }
}
