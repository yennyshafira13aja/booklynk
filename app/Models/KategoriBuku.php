<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    protected $table = 'kategori_bukus';

    protected $fillable = ['nama'];

    //Relasi ke buku (many to many)
    public function bukus()
    {
        return
        $this->belongsToMany(
            Buku::class,
            'kategori_buku_relasi',
            'kategori_buku_id',
            'buku_id',
        );
    }
}
