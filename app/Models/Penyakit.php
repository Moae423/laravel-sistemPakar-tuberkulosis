<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'penyakits';

    public function gejalas()
    {
        return $this->belongsTo(Gejala::class, 'rules', 'id_penyakit', 'id_gejala');
    }
}
