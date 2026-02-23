<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KoleksiPribadi extends Model
{
    protected $table = 'koleksi_pribadis';

    protected $fillable = [
        'user_id',
        'buku_id'
    ];

    public function buku()
    {
        return $this->belongsTo(\App\Models\Buku::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
