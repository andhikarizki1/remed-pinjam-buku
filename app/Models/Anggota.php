<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'table_anggota';
    protected $primaryKey = 'id_anggota';
    protected $fillable = [
        'nama_anggota',
        'jenis_kelamin',
        'alamat',
        'email',
        'no_telp'
    ];
}
