<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table='siswa';
    protected $primaryKey = 'user_id';
    protected $fillable=[
        'user_id',
        'nisn',
        'jk',
        'no_telp',
        'foto',
        'tgl_lahir',
        'tempat_lahir',
        'alamat',
        'asal_sekolah',
        'add_ijazah',
        'status_ayah',
        'nama_ayah',
        'nik_ayah',
        'pekerjaan_ayah',
        'gaji_ayah',
        'status_ibu',
        'nama_ibu',
        'nik_ibu',
        'pekerjaan_ibu',
        'gaji_ibu',
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
