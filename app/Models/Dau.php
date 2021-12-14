<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dau extends Model
{
    use HasFactory;

    protected $table='daftar_ulang';
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
