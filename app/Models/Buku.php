<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'table_buku';
    protected $primaryKey = 'id_buku';
    protected $fillable = [
        'judul_buku',
        'deskripsi',
        'kategori',
        'cover_img'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
