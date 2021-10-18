<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'table_transaksi';
    protected $primaryKey = 'id';
    protected $fillable = ['id_anggota', 'id_buku', 'tgl_pinjam'];
}
