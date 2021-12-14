<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasFactory;

    protected $table='biaya_daftar';
    protected $primaryKey = 'user_id';
    protected $fillable=[
        'user_id',
        'struk',
        'status'
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
