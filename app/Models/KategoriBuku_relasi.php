<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku_relasi extends Model
{
    use HasFactory;

    protected $table =
    'kategori_buku_relasis';

    protected $fillable = [
        'buku_id',
        'kategori_id',
    ];

    public function Buku()
    {
        return
        $this->belongsTo(Buku::class,
        'buku_id');
    }

    public function kategori()
    {
        return
        $this->belongsTo(KategoriBuku::class, 'kategori_id');
    }
}
