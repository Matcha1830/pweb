<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = "bukus";
    protected $fillable = [
        'judul',
        'qty',
        'image',
        'author',
        'sinopsis',
        'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function pinjam()
    {
        return $this->hasMany(Pinjam::class);
    }
}
