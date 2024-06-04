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
    public function disease()
    {
        return $this->belongsTo(Penyakit::class);
    }

    public function symptom()
    {
        return $this->belongsTo(Gejala::class);
    }
    // protected $fillable = ['kode_penyakit', 'kode_gejala', 'nilai_probabilitas'];
    // Jika nama tabel tidak sesuai dengan penamaan konvensi Laravel, sebutkan nama tabelnya
    // protected $table = 'rules';

    // // Tentukan kolom yang boleh diisi
    // protected $fillable = ['nilai_probabilitas'];
}
