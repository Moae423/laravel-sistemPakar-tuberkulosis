<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rule extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function penyakit()
    {
        return $this->hasMany(Penyakit::class, 'idPenyakit');
    }
    public function gejala()
    {
        return $this->hasMany(Gejala::class, 'idGejala');
    }
    // return $this->belongsTo(Produk::class, 'idbarang', 'idbarang');
    // public function gejala()
    // {
    //     return $this->belongsTo(Gejala::class, 'kode_gejala');
    // }
    // protected $fillable = ['kode_penyakit', 'kode_gejala', 'nilai_probabilitas'];
    // Jika nama tabel tidak sesuai dengan penamaan konvensi Laravel, sebutkan nama tabelnya
    // protected $table = 'rules';

    // // Tentukan kolom yang boleh diisi
    // protected $fillable = ['nilai_probabilitas'];
}
