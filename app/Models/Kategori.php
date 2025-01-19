<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategoris";
    protected $fillable = [
        'kategori',
    ];

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
