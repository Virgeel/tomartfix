<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;
use App\Models\Produk;


class Stok extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'foto',
        'harga',
        'produk_id',
        'tanggal',
        'pegawai_id',
        'namaPegawai',
        'stokAwal',
        'stokAkhir',
        'terjual',
        'total'
    ];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }

    public function produk(){
        return $this->belongsToMany(Produk::class,'produk_stok');
    }




    
}
