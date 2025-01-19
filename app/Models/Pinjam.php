<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    protected $table = 'pinjams';
    protected $fillable = [
        'user_id',
        'buku_id',
        'status',
        'tgl_pengembelian'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
