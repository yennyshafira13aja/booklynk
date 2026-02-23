<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $fillable = [
    'judul',
    'pengarang',
    'penerbit',
    'tahun_terbit',
    'kategori',
    'stok',
    'sinopsis',
    'cover'
    
    ];

    //Relasi
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'buku_id');
    }

    public function ulasanbukus()
    {
        return
    $this->hasMany(UlasanBuku::class);
    }

    public function koleksipribadis()
    {
        return
    $this->hasMany(KoleksiPribadi::class);
    }
    
    public function kategoris()
    {
        return
    $this->belongsToMany(Kategori::class,'kategoribuku_relasi','buku_id','kategori_id');
    }
}
