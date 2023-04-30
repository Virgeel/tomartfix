<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stok;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'nama',
        'kategori',
        'foto',
        'harga'

    ];

    public function stok(){
        return $this->belongstoMany(Stok::class,'produk_stok');
    }
}
