<?php

namespace App\Exports;

use App\Models\User as ModelsUser;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModelsUser::all()->where('level','==','0');
    }
}
