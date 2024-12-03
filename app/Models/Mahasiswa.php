<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Tentukan kolom mana yang bisa diisi secara massal
    protected $fillable = [
        'npm',
        'nama',
        'prodi',
    ];

    // Tentukan primary key yang digunakan
    protected $primaryKey = 'npm';

    // Tentukan apakah primary key bersifat auto increment
    public $incrementing = false;

    // Tentukan tipe data dari primary key
    protected $keyType = 'string';
}


