<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'daftar_barang';
    protected $fillable = ['nama_barang', 'kategori_barang', 'satuan', 'harga', 'deskripsi_barang'];
}