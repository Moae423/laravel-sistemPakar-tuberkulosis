<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyakit extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $fillable = [
        'nama_penyakit',
        'id_penyakit',
        'code',
        'detail_penyakit',
        'solusi_penyakit',
    ];
    // protected $table = 'penyakits';

    public function gejalas()
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('storage/diseases/' . basename($value)) : null
        );
    }
}
