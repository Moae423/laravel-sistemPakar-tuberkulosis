<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function penyakits() {
        return $this->belongsToMany(Penyakit::class, 'rules','id_gejala','id_penyakit');
    }
}
